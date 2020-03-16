<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\OrderArrivalNotice;
use Carbon\Carbon;

class ArrivalNotif extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ArrivalNotif:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send arrival notice to customer and operations@';

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
        
        //List all customer who has undelivered orders
        $customers = \App\Customer::with('users')            
            ->whereHas('orders', function($q){
                $q->where('status_id', '<', 4);
            })->get();
        
        $i = 0; // timer email send
        foreach($customers as $customer){
            
            if ($customer->users->count() > 0){
                
                //List all order with arrival date j-2
                $orders = \App\Order::with(['shipment', 'shipment.transshipments', 'shipment.transshipments.destination']) 
                    ->where('customer_id',$customer->id)  
                    ->whereHas('shipment.transshipments', function($q){
                        $q->where('arrival', '=', \Carbon\Carbon::now()->addDays(2)->toDateString());
                    })
                    ->get();

                foreach ($orders as $order) {

                    $transshipments = end($order->shipment->transshipments);
                    $lastTransshipment = end($transshipments);
                    
                    if ( Carbon::parse($lastTransshipment->arrival)->format('Y-m-d') == Carbon::today()->addDays(2)->format('Y-m-d') )
                    {

                        $to = array(); // Reset user list
                        // List user email list
                        foreach ($customer->users as $user){
                            $to[] = [ 'email'=> $user->email, 'name' => $user->name];
                        }

                        $when = now()->addMinutes($i); // Send email every minutes
                        \Mail::to($to)->later($when, new OrderArrivalNotice($orders,'j-2'));
                        $i++;
                    }
                    
                }
               
            }

        }
 
    }
}
