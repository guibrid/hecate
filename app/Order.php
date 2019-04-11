<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function statuses()
    {
        return $this->belongsToMany('App\Status');
    }
    
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function shipment()
    {
        return $this->belongsTo('App\Shipment');
    }

}
