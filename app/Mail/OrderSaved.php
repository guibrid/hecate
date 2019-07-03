<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSaved extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;
    protected $emails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
        $this->emails = \App\Helpers::getAccountEmails();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if (!empty($this->emails['bcc'])){
            $this->bcc($this->emails['bcc']);
        }
        
        if(!empty($this->emails['reply'])){
            $this->replyTo($this->emails['reply']);
        }

        return $this->from( $this->emails['from'], env('APP_NAME') )
                    ->subject("Your order has been updated - Booking N° ".$this->order['number'])
                    ->view('emails.orders.saved')
                    ->with(['order' => $this->order]);
    }
}
