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
        return $this->hasOne('App\Customer');
    }
}
