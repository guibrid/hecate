<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function packs()
    {
        return $this->hasMany('App\Pack');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($order) {
            //remove related documents file
            foreach($order->documents as $document){
                $document->delete();
            }
            // Remove the document order folder
            Storage::disk('local')->deleteDirectory('documents/'.$order->customer_id.'/'.$order->id);
            return true;
        });
    }

}
