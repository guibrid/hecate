<?php

use Illuminate\Database\Seeder;
use App\Transshipment;
use App\Place;
use App\Shipment;

class TransshipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $origin_place = Place::where('title', 'Le Havre')->first();
        $destination_place = Place::where('title', 'Bangkok')->first();
        $shipment = Shipment::where('id', 1)->first();

        $transshipment = new Transshipment();
        $transshipment->type = 'sea';
        $transshipment->departure  = date("Y-m-10 H:i:s");
        $transshipment->arrival  = date("Y-m-15 H:i:s");
        $transshipment->vessel  = 'CGM Marco';
        $transshipment->origin_place  = $origin_place->id;
        $transshipment->destination_place  = $destination_place->id;
        $transshipment->shipment_id  = $shipment->id;
        $transshipment->save();

        $transshipment = new Transshipment();
        $transshipment->type = 'air';
        $transshipment->departure  = date("Y-m-17 H:i:s");
        $transshipment->arrival  = date("Y-m-18 H:i:s");
        $transshipment->vessel  = 'Air New Zealand NZ456';
        $transshipment->origin_place  = 2;
        $transshipment->destination_place  = 3;
        $transshipment->shipment_id  = $shipment->id;
        $transshipment->save();
    }
}
