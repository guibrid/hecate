<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\OrderRecap::class,
        Commands\QueueWork::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('OrderRecap:send')->weeklyOn(1, '8:00');
        $schedule->command('ArrivalNotif:send')->dailyAt('03:00');
        $schedule->command('CheckDelivery:run')->dailyAt('04:00');
        $schedule->command('QueueWork:execute')->everyFiveMinutes();
        $schedule->command('backup:clean')->dailyAt('01:30');
        $schedule->command('backup:run')->dailyAt('01:35');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
