<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\OrderSaved;

class EmailController extends Controller
{
    public function sendEmail()
    {
    $myEmail = 'guillaume.briard@gmail.com';
      Mail::to($myEmail)->send(new OrderSaved());
 
      if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
      }else{
           return response()->success('Great! Successfully send in your mail');
         }
    }
}
