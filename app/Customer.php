<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public static function boot() {
        parent::boot();

        static::deleting(function($customer) {
            //remove related orders and documents
            foreach($customer->orders as $order){

                foreach($order->documents as $document)
                {
                    $document->delete();
                }
                
                $order->delete();
            }
            Storage::disk('local')->deleteDirectory('documents/'.$customer->id);

            //remove all related users
            foreach($customer->users as $user){
                $user->delete();
            }

            return true;
        });
    }

}
