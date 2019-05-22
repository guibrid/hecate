<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Transshipment;

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
            // Update order bellonging to this shipment
            Order::where('shipment_id', $shipment->id)->update(['shipment_id' => null]);
            // Delete all transshipments related to this shipment
            foreach($shipment->transshipments as $transshipment){
                $transshipment->delete();
            }

            return true;
        });
    }
    
}
