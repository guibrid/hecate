<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class OrdersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithEvents
{
    protected $orders;

    public function __construct(object $orders)
    {
        $this->orders = $orders;
    }

    public function headings(): array
    {
        return [
            ['Order','','','','','','','','','','','','Shipment'],
            [
            //Order
            'Customer code',
            'Consignee',
            'Shipper/supplier',
            'Booking',
            'B/L & HAWB',
            'Order number',
            'Status',
            'Shipment mode',
            '# packages',
            'Weight',
            'Volume',
            'Commercial value',
            //Shipment
            'Consol #',
            'Title',
            'Doc reception',
            'Custom control',
            'Cutoff',
            'Container number',
            'Departure date',
            'Origin (Vessel)',
            'Arrival date',
            'Destination (Vessel)',
            'Comments'
            ]
        ];
    }

    public function map($orders): array
    {
        $line = [
            //Order
            $orders->customer->name,
            $orders->recipient,
            $orders->supplier,
            $orders->number,
            $orders->bl_number,
            $orders->order_number,
            $orders->status->title,
            $orders->load,
            $orders->package_number,
            $orders->weight,
            $orders->volume,
            $orders->value,
        ];

        //Shipment
        $shipComment = '';
        if (!empty($orders->shipment->id)){
            array_push($line, $orders->shipment->number,
                              $orders->shipment->title,
                              \Carbon\Carbon::parse($orders->shipment->document_reception)->format('d/m/Y'),
                              \Carbon\Carbon::parse($orders->shipment->custom_control)->format('d/m/Y'),
                              \Carbon\Carbon::parse($orders->shipment->cutoff)->format('d/m/Y'),
                              $orders->shipment->container_number
            );
            $shipComment = $orders->shipment->comment;
        } else {
            array_push($line, '','','','','','');
        }

        //Transshipment
        $transComment = '';
        if (!empty($orders->shipment->transshipments[0])){
            $loading = $orders->shipment->transshipments->first();
            $discharged = $orders->shipment->transshipments->last();
            array_push($line, \Carbon\Carbon::parse($loading->departure)->format('d/m/Y'),
                              $loading->origin->title. ' ('.$loading->vessel.')',
                              \Carbon\Carbon::parse($discharged->arrival)->format('d/m/Y'),
                              $discharged->destination->title. ' ('.$discharged->vessel.')'
            );
            // Transshipment Comments
            foreach($orders->shipment->transshipments as $transshipment)
            {
                $transComment .= $transshipment->comment;
            }
        } else {
            array_push($line, '','','','');
        }

        //Comments
        array_push($line, $orders->comment.'  '.$shipComment.'  '.$transComment);

        return $line;

    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                // APPLY STYLE
                // Status cell background color
                $rows = $event->sheet->getDelegate()->toArray(); // Convert sheet to array and loop
                foreach ($rows as $k => $v) {
                    $k++;
                    // Switch about the status value
                    switch ($v[6]) {
                        case 'Proceeding':
                            $statusBg = 'da9694';
                            break;
                        
                        case 'In wharehouse':
                            $statusBg = 'ccc0da';
                            break;

                        case 'Arrived':
                            $statusBg = 'c4d79b';
                            break;

                        case 'Loaded':
                            $statusBg = 'fabf8f';
                            break;
                        
                        default:
                            $statusBg = '';
                            break;
                    }

                    $backgroundStatus = [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 
                        'color' => [ 'rgb' => $statusBg ] 
                    ];

                    $event->sheet->getStyle('G'.$k)->getFill()->applyFromArray($backgroundStatus);
                }
                
                $backgroundOrder = [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 
                    'color' => [ 'rgb' => 'bdd7f2' ],
                ];
                $backgrondShipment = [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 
                    'color' => [ 'rgb' => '829fbc' ] 
                ];
                $backgroundSubHeader = [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 
                    'color' => [ 'rgb' => 'c8c8c8' ] 
                ];

                $event->sheet->mergeCells('A1:L1')->mergeCells('M1:W1');
                $event->sheet->getStyle('A1:M1')->getAlignment()->applyFromArray( ['horizontal' => 'center'] );
                $event->sheet->getStyle('A1:M1')->getFont()->setSize(18);
                $event->sheet->getStyle('A1')->getFill()->applyFromArray($backgroundOrder);
                $event->sheet->getStyle('M1')->getFill()->applyFromArray($backgrondShipment);
                $event->sheet->getStyle('A2:W2')->getFill()->applyFromArray($backgroundSubHeader);

            }
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->orders;
    }

}
