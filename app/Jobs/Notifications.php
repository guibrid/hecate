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
            $to[] = [ 'email'=> $user->email, 'name' => $user->name];
        }
        
        // Send notification
        Mail::to($to)->send(new OrderSaved($order));
    
        if (Mail::failures()) {

            return 'Notification not send.';
        
        }else{

            return 'Notification send.';

        }

    }

}