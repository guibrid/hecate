<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function transshipments()
    {
        return $this->hasMany('App\Transshipment');
    }
    
}
