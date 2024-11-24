<?php

namespace App\Filament\Resources;

use App\Filament\NavigationGroups;
use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = NavigationGroups::CONTENT;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Select::make('user_id')
                                    ->relationship('user', 'first_name')
                                    ->preload()
                                    ->searchable()
                                    ->required(),
                                Forms\Components\Select::make('collection_id')
                                    ->relationship('collection', 'title')
                                    ->preload()
                                    ->searchable()
                                    ->required(),
                                Forms\Components\Select::make('comment_id')
                                    ->relationship('parent', 'content')
                                    ->searchable()
                                    ->preload()
                                    ->label('Reply to')
                                    ->options(function () {
                                        return Comment::query()
                                            ->whereNull('comment_id')
                                            ->get()
                                            ->mapWithKeys(function ($comment) {
                                                return [$comment->id => "Reply to: " . substr(str()->limit($comment->content, 30), 0, 50) .
                                                    "... (by " . $comment->user->name . ")"];
                                            });
                                    }),
                            ])->columnSpan(1),
                        Forms\Components\Textarea::make('content')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('status')
                            ->required()
                            ->default(true),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('collection_id')
                    ->label('Collection')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('content')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent.content')
                    ->label('Reply to')
                    ->limit(30),
                Tables\Columns\ToggleColumn::make('status')
                    ->label("Approved/Unapproved"),
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
                Tables\Filters\SelectFilter::make('status')
                ->options([
                    '1' => 'Approved',
                    '0' => 'Not Approved',
                ]),
            Tables\Filters\SelectFilter::make('type')
                ->options([
                    'parent' => 'Parent Comments',
                    'replies' => 'Replies',
                ])
                ->query(function (Builder $query, array $data) {
                    if ($data['value'] === 'parent') {
                        $query->whereNull('comment_id');
                    } elseif ($data['value'] === 'replies') {
                        $query->whereNotNull('comment_id');
                    }
                }),
            ], layout: FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
