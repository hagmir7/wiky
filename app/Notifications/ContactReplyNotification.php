<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class ContactReplyNotification extends Notification
{
    use Queueable;

    protected $replyMessage;
    private $contactName;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $replyMessage, string $contactName)
    {
        $this->replyMessage = $replyMessage;
        $this->contactName = $contactName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Re: ' . config('app.name') . ' support@wikybook.com')
            ->greeting('Hello ' . $this->contactName . ',')
            ->line('Thank you for reaching out to us. We have reviewed your message and would like to respond:')
            ->line(new HtmlString('<strong> Our Response: </strong>'))
            ->line($this->replyMessage)
            ->line('If you have any further questions, feel free to reach out.')
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'A reply has been sent to your contact message.',
            'reply_content' => $this->replyMessage,
            'timestamp' => now()->toIso8601String(),
        ];
    }
}
