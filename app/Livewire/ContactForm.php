<?php

namespace App\Livewire;

use App\Filament\Resources\ContactResource;
use App\Models\Contact;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';
    public $privacyPolicy = false;

    public $success = false;

    protected $rules = [
        'name' => 'required|min:3|max:100',
        'email' => 'required|email|max:100',
        'subject' => 'required|min:5|max:200',
        'message' => 'required|min:10|max:2000',
        'privacyPolicy' => 'accepted',
    ];

    protected $messages = [
        'name.required' => 'The name field is required.',
        'name.min' => 'The name must be at least 3 characters.',
        'name.max' => 'The name may not be greater than 100 characters.',

        'email.required' => 'The email field is required.',
        'email.email' => 'The email must be a valid email address.',
        'email.max' => 'The email may not be greater than 100 characters.',

        'subject.required' => 'The subject field is required.',
        'subject.min' => 'The subject must be at least 5 characters.',
        'subject.max' => 'The subject may not be greater than 200 characters.',

        'message.required' => 'The message field is required.',
        'message.min' => 'The message must be at least 10 characters.',
        'message.max' => 'The message may not be greater than 2000 characters.',

        'privacyPolicy.accepted' => 'You must agree to the privacy policy.',
    ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm(): void
    {
        $this->validate();

        // Create contact record
        $contact = Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
            'status' => 'new',
            'ip_address' => request()->ip(),
        ]);

        // Notify admin
//        $this->notifyAdmin($contact);

        $admin = User::where('email', 'admin@admin.com')->first();

        \Filament\Notifications\Notification::make()
            ->title('New Contact Message')
            ->body('From: ' . $contact->name)
            ->actions([
                Action::make('view')
                    ->label('View')
                    ->url(ContactResource::getUrl('view', ['record' => $contact->id])),
            ])
            ->sendToDatabase($admin);

        // Reset form
        $this->resetForm();

        // Show success message
        $this->success = true;
    }

    private function notifyAdmin(Contact $contact): void
    {
        $admin = User::where('email', 'admin@admin.com')->first();
        Notification::send($admin, new NewContactNotification($contact));
    }

    private function resetForm(): void
    {
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';
        $this->privacyPolicy = false;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.contact-form');
    }
}
