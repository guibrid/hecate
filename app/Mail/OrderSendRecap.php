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
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        if (!empty(env('MAIL_BCC_ADDRESS'))){
            $this->bcc(env('MAIL_BCC_ADDRESS'));
        }

        return $this->from( env('MAIL_NOREPLY'), env('APP_NAME') )
                    ->subject("Order recap")
                    ->view('emails.orders.recap')
                    ->attach($this->attachment);
    }
}
