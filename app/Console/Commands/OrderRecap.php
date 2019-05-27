<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\OrderSendRecap;
use App\Customer;
use App\Order;
use App\Shipment;
use Carbon\Carbon;
use PDF;


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

        //List all customer
        $customers = Customer::with('users')->get();
        //List all current shipment id not arrived or arrived less than 10 days
        $shipments = Shipment::whereHas('transshipments', function ($query) {
                $query->where('arrival', '>=', Carbon::now()->subDays(10));
                })->pluck('id');

        if(count($shipments) == 0 ){$shipments = '';}// change format for IN query
        
        foreach($customers as $customer){

            $orders = Order::with(['shipment', 'status' , 'shipment.transshipments' , 'shipment.transshipments.origin', 'shipment.transshipments.destination'])
                            ->whereRaw('customer_id = ? AND (shipment_id IN (?) OR shipment_id IS NULL)', [$customer->id, $shipments])
                            ->get();

            //generate pdf with orders data
            $pdfName =$customer->id.'-'.time().'.pdf';
            $pdf = PDF::loadView('emails.orders.recapPdf', ['orders'=>$orders])->setPaper('a4', 'landscape')->save(storage_path('app/recaps/'.$pdfName));

            // List user email list
            foreach ($customer->users as $user){
                $to[] = [ 'email'=> $user->email, 'name' => $user->name];
            }
            
            // Email on queue with attachement       
            \Mail::to($to)->queue(new OrderSendRecap(storage_path('app/recaps/'.$pdfName)));

        }
        // Execute all Mail queue job generate 
        \Artisan::call('queue:work', ['--stop-when-empty' => true]);


    }
}
