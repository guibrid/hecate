<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function shipments()
    {
        return $this->hasMany('App\Shipment');
    }
}
