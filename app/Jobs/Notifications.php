<?php 

namespace App\Jobs;

use Mail;
use App\Mail\OrderSaved;

class Notifications
{

    public static function orderSaved($order)
    {
        // Get customer user email list
        $myEmail = ['guillaume.briard@gmail.com','guillaume@web-axis.biz'];
        Mail::to($myEmail)->send(new OrderSaved($order));
    
        if (Mail::failures()) {
            return 'Notification not send.';
        }
        else
        {
            return 'Notification send.';
        }

    }

}