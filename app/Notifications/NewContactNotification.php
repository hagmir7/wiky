<?php

namespace App\Notifications;

use App\Filament\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactNotification extends Notification
{
    use Queueable;

    protected $contact;

    /**
     * Create a new notification instance.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
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
            ->subject('New Contact Message: ' . $this->contact->subject)
            ->greeting('Hello Admin!')
            ->line('You have received a new contact message from ' . $this->contact->name . '.')
            ->line('Subject: ' . $this->contact->subject)
            ->line('Message:')
            ->line($this->contact->message)
            ->action('View in Admin Panel', url(ContactResource::getUrl('view', ['record' => $this->contact->id])))
            ->line('Thank you for using Wikybook!');
    }

    public function toDatabase($notifiable): array
    {
        return [
            'contact_id' => $this->contact->id,
            'name' => $this->contact->name,
            'email' => $this->contact->email,
            'subject' => $this->contact->subject,
            'message_preview' => substr($this->contact->message, 0, 100) . '...',
            'timestamp' => now()->toIso8601String(),
        ];
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
