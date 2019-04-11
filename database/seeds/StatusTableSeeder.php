<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        $status->title = 'Proceeding';
        $status->save();
        $status = new Status();
        $status->title = 'In wharehouse';
        $status->save();
        $status = new Status();
        $status->title = 'Loaded';
        $status->save();
        $status = new Status();
        $status->title = 'Delivered';
        $status->save();
    }
}
