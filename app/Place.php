<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function origins()
    {
        return $this->hasMany('App\Transshipment', 'origin_place');
    }

    public function destinations()
    {
        return $this->hasMany('App\Transshipment', 'destination_place');
    }
}
