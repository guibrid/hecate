<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlaceTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(ShipmentTableSeeder::class);
        $this->call(TransshipmentTableSeeder::class);
    }
}
