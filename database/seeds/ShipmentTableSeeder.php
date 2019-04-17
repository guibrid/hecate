<?php

use Illuminate\Database\Seeder;
use App\Shipment;

class ShipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shipment = new Shipment();
        $shipment->number = '23G45J';
        $shipment->title = 'Shipment to AKL';
        $shipment->document_reception = date("Y-m-10 H:i:s");
        $shipment->custom_control  = date("Y-m-11 H:i:s");
        $shipment->cutoff  = date("Y-m-12 H:i:s");
        $shipment->container_number = '12345';
        $shipment->save();
    }
}
