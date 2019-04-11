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
        $order_status = Status::where('title', 'Proceeding')->first();

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
        $order->save();
        $order->statuses()->attach($order_status);
    }
}

