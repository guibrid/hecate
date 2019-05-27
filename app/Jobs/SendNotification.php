<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Mail;
use App\Mail\OrderSaved;
use App\Helpers;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    protected $transshipments;

    public $retryAfter = 3;
    public $tries = 20;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($order, $transshipments= null )
    {

        $this->order = $order;
        $this->transshipments = $transshipments;

    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        // Get customer user email list
        $usersList = Helpers::getCustomerUserList($this->order['customer_id']);
        foreach ($usersList as $user){
            $to[] = [ 'email'=> $user->email, 'name' => $user->name];
        }
        Mail::to($to)->send(new OrderSaved($this->order, $this->transshipments));
    }
}
