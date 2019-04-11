<?php

use Illuminate\Database\Seeder;
use App\Place;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $place = new Place();
        $place->title = 'Le Havre';
        $place->country = 'France';
        $place->type = 'sea';
        $place->abbreviation = 'LHE';
        $place->save();
        
        $place = new Place();
        $place->title = 'Bangkok';
        $place->country = 'Thailande';
        $place->type = 'sea';
        $place->abbreviation = 'BKK';
        $place->save();
    }
}
