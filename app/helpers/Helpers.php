<?php 

namespace App\helpers;

use App\Transshipment;

class Helpers
{

    /**
     * Get all transshipment available for a shipment.
     *
     * @param  int $shipment_id
     * @return array
     */
    public static function getTransshipments($shipment_id)
    {

        $transshipments = Transshipment::where('shipment_id', $shipment_id)
                                ->with(['origin', 'destination'])
                                ->get();

        return $transshipments->toArray();

    }

    /**
     * Get the div the number of transshipment
     *
     * @param  array $transshipment
     * @param  int $nbr_transshipment
     * @return string
     */
    public static function transshipmentDiv($transshipment, $nbr_transshipment)
    {

        switch ($nbr_transshipment) {
            case '1':
                $size = 6;
                break;
            case '2':
                $size = 3;
                break;
            case '3':
                $size = 2;
                break;
            case '4':
                $size = 2;
                break;
        }

        $div = '<div class="col-md-'.$size.' col-xs-12" style="text-align:center">
                    <div style="text-align:center"><p><i class="fa fa-ship fa-2x"></i><br />'.strtoupper($transshipment['type']).' FREIGHT</p></div>
                    <div style="text-align:center"><p><b>ETD '.$transshipment['origin']['title'].'</b><br />'.$transshipment['departure'].'</p></div>
                    <div style="text-align:center"><p><b>ETA '.$transshipment['destination']['title'].'</b><br />'.$transshipment['arrival'].'</p></div>
                    <div style="text-align:center"><p><b>Vessel</b><br />'.$transshipment['vessel'].'</p></div>
                </div>';

        return $div;

    }
}