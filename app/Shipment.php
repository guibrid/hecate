<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    public function customer()
    {
        return $this->hasOne('App\Customer');
    }
}
