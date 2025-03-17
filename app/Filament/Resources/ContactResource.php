<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use App\Notifications\ContactReplyNotification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(100),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(100),

                        Forms\Components\TextInput::make('subject')
                            ->required()
                            ->maxLength(200),

                        Forms\Components\Textarea::make('message')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('message')
                    ->limit(50)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('reply_status')
                    ->label('Status')
                    ->badge()
                    ->getStateUsing(fn (Contact $record): string => $record->is_replied ? 'Replied' : 'Pending')
                    ->colors([
                        'success' => 'Replied',
                        'danger' => 'Pending',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('reply')
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
                        // Send the reply notification
                        $record->notify(new ContactReplyNotification($data['reply_message'], $record->name));

                        // Mark the contact as replied
                        $record->update(['is_replied' => true]);

                        // Notify the admin that the reply was sent successfully
                        Notification::make()
                            ->title('Reply sent successfully')
                            ->success()
                            ->send();
                    })
                    ->hidden(fn (Contact $record) => $record->is_replied),

//                Tables\Actions\Action::make('view_reply_indicator')
//                    ->label('Replied')
//                    ->icon('heroicon-o-check-circle')
//                    ->color('success')
//                    ->disabled(true)
//                    ->tooltip('This contact has been replied to')
//                    ->visible(fn (Contact $record) => $record->is_replied),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'view' => Pages\ViewContact::route('/{record}/view'),
        ];
    }
}
