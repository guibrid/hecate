<?php 

namespace App\Jobs;

use Mail;
use App\Mail\OrderSaved;
use App\Helpers;

class Notifications
{

    public static function orderSaved($order)
    {
        // Get customer user email list
        $usersList = Helpers::getCustomerUserList($order->customer_id);
        foreach ($usersList as $user){
            $emails[] = $user->email;
        }
        
        // Send notification
        Mail::to($emails)->send(new OrderSaved($order));
    
        if (Mail::failures()) {

            return 'Notification not send.';
        
        }else{

            return 'Notification send.';

        }

    }

}