<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BidAcceptedNotification extends Notification
{
    use Queueable;

    protected $job;

    /**
     * Create a new notification instance.
     *
     * @param mixed $job
     */
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Bid Accepted Notification')
            ->line("Congratulations! Your bid for the job '{$this->job->title}' has been accepted.")
            // ->action('View Job Details', url(route('freelancer.viewJob', $this->job->id)))
            ->line('Looking forward to hearing from you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
