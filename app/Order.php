<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function shipment()
    {
        return $this->belongsTo('App\Shipment');
    }

    public function documents()
    {
        return $this->hasMany('App\Document');
    }

}
