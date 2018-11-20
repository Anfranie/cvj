<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewLessonNotification extends Notification
{
    use Queueable;
    protected $event;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Event)
    {
        $this->$Event=$Event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'event' => $this->event,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'event' => $this->event,
        ];
    }
}
