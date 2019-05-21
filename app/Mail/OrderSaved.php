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
    protected $transshipments;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $transshipments)
    {
        $this->order = $order;
        $this->transshipments = $transshipments;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from( env('MAIL_NOREPLY'), env('APP_NAME') )
                    ->subject("Your order has been updated - Booking N° ".$this->order['number'])
                    ->view('emails.orders.saved')
                    ->with(['order' => $this->order, 'transshipments' => $this->transshipments]);
    }
}
