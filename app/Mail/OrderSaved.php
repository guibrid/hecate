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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from( env('MAIL_NOREPLY') )
                    ->view('emails.orders.saved')
                    ->with([
                        'orderId'        => $this->order->id,
                        'booking'        => $this->order->number,
                        'title'          => $this->order->title,
                        'batch'          => $this->order->batch,
                        'load'           => $this->order->load,
                        'package_number' => $this->order->package_number,
                        'weight'         => $this->order->weight,
                        'volume'         => $this->order->volume,
                        'recipient'      => $this->order->recipient,
                        'supplier'       => $this->order->supplier,
                        'comment'        => $this->order->comment ,
                        ]);
    }
}
