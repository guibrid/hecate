<?php 

namespace App\Jobs;

use Mail;
use App\Mail\OrderSaved;

class Notifications
{

    public static function orderSaved($order)
    {
        // Get customer user email list
        $myEmail = 'guillaume.briard@gmail.com';
        Mail::to($myEmail)->send(new OrderSaved($order));
    
        if (Mail::failures()) {
            return 'Sorry! Please try again later';
        }
        else
        {
            return 'Great! Successfully send in your mail';
        }

    }

}