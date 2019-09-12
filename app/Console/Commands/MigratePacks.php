<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigratePacks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MigratePacks:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        echo 'toto';
        //List all customer
        $orders = \App\Order::all();

        foreach($orders as $order){

            if($order->weight || $order->volume || $order->package_number){
                $pack = new \App\Pack;
                $pack->type = "ptl";
                if ($order->package_number) { $pack->number = $order->package_number;  } else { $pack->number = 1; }
                $pack->weight = $order->weight;
                $pack->volume = $order->volume;
                $pack->order_id = $order->id;
                $pack->save();
            }
            var_dump($order->weight.'|||'.$order->volume.'|||'.$order->package_number);
        }

        // Get all orders

        //loop orders

            // insert in packs data from orders(package,volume,weight)

            // update the orders(package,volume,weight) with the total of packs

    }
}
