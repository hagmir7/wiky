<?php

namespace App\Providers;

use App\Filament\Resources\ContactResource;
use App\Models\Contact;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        $admin = User::where('email', 'admin@admin.com')->first();
//
//        Contact::created(function (Contact $contact) use ($admin) {
//            Notification::make()
//                ->title('New Contact Message')
//                ->body('From: ' . $contact->name)
//                ->actions([
//                    Action::make('view')
//                        ->label('View')
//                        ->url(ContactResource::getUrl('view', ['record' => $contact])),
//                ])
//                ->danger()
//                ->sendToDatabase($admin);
//        });
    }
}
