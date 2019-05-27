<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class QueueWork extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'QueueWork:execute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the queue list';

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
        \Artisan::call('queue:work', ['--stop-when-empty' => true, '--tries' => 20, '--delay' => 10, '--sleep' => 10]);
    }
}
