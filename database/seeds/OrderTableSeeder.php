<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Customer;
use App\Status;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer_user = Customer::where('name', 'Loockeed Martin')->first();

        $order = new Order();
        $order->number = 'T657Y';
        $order->Title = 'Titre de la commande';
        $order->batch  = 'T-34';
        $order->load  = 'LCL';
        $order->package_number  = '12';
        $order->weight  = '1245';
        $order->volume  = '0.678';
        $order->recipient  = 'Lockeed Martin';
        $order->supplier  = 'Airbus';
        $order->customer_id  = $customer_user->id;
        $order->status_id  = 3;
        $order->shipment_id  = 1;
        $order->save();

        $order = new Order();
        $order->number = '56748';
        $order->Title = 'Titre de la commande';
        $order->batch  = '456';
        $order->load  = 'FCL';
        $order->package_number  = '5';
        $order->weight  = '124';
        $order->volume  = '1.8';
        $order->recipient  = 'Lockeed Martin';
        $order->supplier  = 'Boeing';
        $order->customer_id  = $customer_user->id;
        $order->status_id  = 1;
        $order->save();
    }
}

