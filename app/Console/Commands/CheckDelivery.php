<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Order;
use Carbon\Carbon;

class CheckDelivery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CheckDelivery:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Base on the ETA date. Set order status as delivery if ETA date match with date of the day';

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

        Order::where('status_id', '<', 4)
                ->whereHas('shipment.transshipments', function ($query) {
                    $query->where('arrival', 'like', Carbon::today()->format('Y-m-d').'%');
                })
                ->update(['status_id' => 4, 'delivery' => Carbon::today()->format('Y-m-d')]);

    }
}
