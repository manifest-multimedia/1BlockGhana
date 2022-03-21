<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailtrapExample extends Mailable
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
        $subject= 'SignUp Request';

    /*
     $this->from($sender_email, $sender_name)
     ->subject($subject)->view('mail.client_info')->with('data', $this->data);
    */

  /*    return $this->from($sender_email, $sender_name)
     ->subject($subject)->view('mail.dynamic_email')->with('data', $this->data);
    } */
   // dd($this->data['url']);
    return $this->from($sender_email, $sender_name)
                ->markdown('mail.emailtemplate', [
                    'url' => $this->data['url'],
                ]);
}
}
