<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->name = 'Loockeed Martin';
        $customer->address = '10 street of the wood';
        $customer->city = 'New York';
        $customer->cp = '12345';
        $customer->country = 'USA';
        $customer->save();
    }
}
