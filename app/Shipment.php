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

    public static function boot() {
        parent::boot();

        static::deleting(function($shipment) {
            //remove related transshipment
            foreach($shipment->transshipments as $transshipment){
                $transshipment->delete();
            }
            // Update shipment field in orders
            Order::where('shipment_id', $shipment->id)->update(['shipment_id' => null]);
            return true;
        });
    }
    
}
