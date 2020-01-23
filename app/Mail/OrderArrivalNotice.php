<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderArrivalNotice extends Mailable
{
    use Queueable, SerializesModels;

    protected $orders;
    protected $nbrDay;
    protected $emails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $orders, $nbrDay )
    {
        $this->orders = $orders;
        $this->nbrDay = $nbrDay;
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
                    ->subject("Incoming orders")
                    ->view('emails.orders.arrivalNotice')
                    ->with(['orders' => $this->orders]);
    }
}
