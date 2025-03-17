<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use App\Models\Contact;
use App\Notifications\ContactReplyNotification;
use Filament\Actions;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('reply')
                ->label('Send Reply')
                ->icon('heroicon-o-paper-airplane')
                ->color('primary')
                ->form([
                    Forms\Components\Textarea::make('reply_message')
                        ->label('Reply Message')
                        ->required()
                        ->helperText('Write your reply to this contact'),
                ])
                ->action(function (Contact $record, array $data) {
                    // send a reply to the contact
                    $this->notify(new ContactReplyNotification($data['reply_message'], $record->name));

                    // mark the contact as replied
                    $record->update(['is_replied' => true]);

                    // notify the admin that the reply was sent successfully
                    Notification::make()
                        ->title('Reply sent successfully')
                        ->success()
                        ->send();
                })
                ->hidden(fn (Contact $record) => $record->is_replied),

            Actions\Action::make('view_reply_indicator')
                ->label('Replied')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->disabled(true)
                ->visible(fn (Contact $record) => $record->is_replied),
        ];
    }
}
