<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OTPMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sender_name= getenv('MAIL_FROM_NAME');
        $sender_email= getenv('MAIL_FROM_ADDRESS');

        return $this->from($sender_email, $sender_name)
                ->subject('Account Setup')
                ->markdown('mail.emailtemplate', [
                    'data' => $this->data,
                    'url' => $this->data['url'],
                ]);
    }
}