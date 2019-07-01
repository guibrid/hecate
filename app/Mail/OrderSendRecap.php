<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSendRecap extends Mailable
{
    use Queueable, SerializesModels;

    protected $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $attachment )
    {
        $this->attachment = $attachment;
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
                    ->subject("Order recap")
                    ->view('emails.orders.recap')
                    ->attach($this->attachment);
    }
}
