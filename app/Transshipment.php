<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transshipment extends Model
{
    public function shipment()
    {
        return $this->belongsTo('App\Shipment');
    }

    public function origin()
    {
        return $this->belongsTo('App\Place', 'origin_place');
    }

    public function destination()
    {
        return $this->belongsTo('App\Place', 'destination_place');
    }
}
