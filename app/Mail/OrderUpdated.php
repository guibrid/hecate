<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderUpdated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;
    protected $documents;
    protected $transshipments;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $documents, $transshipments)
    {
        $this->order = $order;
        $this->documents = $documents;
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
        ->view('emails.orders.updated')
        ->with(['order' => $this->order, 'documents' => $this->documents, 'transshipments' => $this->transshipments]);
    }
}
