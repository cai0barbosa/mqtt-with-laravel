<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AgencyDoorOpeningNotification extends Notification
{
    public function __construct()
    {}

    public function via($notifiable) : array
    {
        return ['mail'];
    }

    public function toMail($notifiable) : MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!')
        ;
    }

    public function toArray($notifiable) : array
    {
        return [];
    }
}
