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
    protected $schedule;
    protected $emails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $attachment, $schedule )
    {
        $this->attachment = $attachment;
        $this->emails = \App\Helpers::getAccountEmails();
        $this->schedule = $schedule;
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

        if(!empty($this->schedule)){
            $this->attach($this->schedule, [
                'as' => 'schedule.pdf',
                'mime' => 'application/pdf',
            ]);
        }

        return $this->from( $this->emails['from'], env('APP_NAME') )
                    ->subject("Order recap")
                    ->view('emails.orders.recap')
                    ->attach($this->attachment);
    }
}
