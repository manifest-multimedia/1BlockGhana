<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class OTPNotification extends Notification
{


    use Queueable, SerializesModels;
    public $otpmessage;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($otpmessage)
    {
        //dd($otpmessage);
        $this->$otpmessage = $otpmessage;
    }

   /**
     * Build the message.
     *
     * @return $this
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->otpmessage['body1'])
                    ->line($this->otpmessage['body2'])
                    ->line($this->otpmessage['body3'])
                    ->action($this->otpmessage['btntext'], $this->otpmessage['url'])
                    ->line($this->otpmessage['thankyou']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];

   }
}