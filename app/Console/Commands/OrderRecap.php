<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\OrderSendRecap;
use App\Customer;
use App\Order;
use App\Shipment;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Storage;


class OrderRecap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'OrderRecap:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This cron job is use to send orders recap to customer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Check if recaps/ folder exist
        if(!Storage::exists('recaps')){
            Storage::makeDirectory('recaps', 0775, true); //creates directory
        }

        //List all customer
        $customers = Customer::with('users')->get();
        $i = 1; // timer email send
        foreach($customers as $customer){

            if ($customer->users->count() > 0){

                $to = array(); // Reset user list
                $orders = Order::with(['shipment', 'status' , 'shipment.transshipments' , 'shipment.transshipments.origin', 'shipment.transshipments.destination'])
                                ->where('customer_id',$customer->id)
                                ->where(function ($query) {
                                    $query->where('delivery', '>=', Carbon::now()->subDays(10))
                                          ->orWhereNull('delivery');
                                })    
                                ->get();
                // If ongoing orders, procceed notification
                if ($orders->count() > 0){

                    //generate pdf with orders data
                    $pdfName =$customer->id.'-'.time().'.pdf';
                    $pdf = PDF::loadView('emails.orders.recapPdf', ['orders'=>$orders])->setPaper('a4', 'landscape')->save(storage_path('app/recaps/'.$pdfName));

                    // List user email list
                    foreach ($customer->users as $user){
                        $to[] = [ 'email'=> $user->email, 'name' => $user->name];
                    }

                    $when = now()->addMinutes($i); // Send email every minutes
                    // Email on queue with attachement       
                    \Mail::to($to)->later($when, new OrderSendRecap(storage_path('app/recaps/'.$pdfName)));

                }
                $i++; // Incremante by 1 the minute between each email send
            }
          
        }

    }
}
