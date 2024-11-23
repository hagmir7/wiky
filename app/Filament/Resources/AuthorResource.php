<?php

namespace App\Filament\Resources;

use App\Filament\NavigationGroups;
use App\Filament\Resources\AuthorResource\Pages;
use App\Filament\Resources\AuthorResource\RelationManagers;
use App\Models\Author;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationGroup = NavigationGroups::CATALOG;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->collection('authors')
                            ->alignCenter()
                            ->label(false)
                            ->avatar(),
                        SpatieMediaLibraryFileUpload::make('cover')
                            ->collection('author-cover')
                            ->image(),

                        Forms\Components\TextInput::make('full_name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),
                    ])->columnSpan(2),
                        Forms\Components\Section::make()
                            ->schema([Forms\Components\Select::make('user_id')
                            ->relationship('user', 'first_name')
                            ->preload()
                            ->searchable()
                            ->default(null),
                        Forms\Components\DatePicker::make('birth')
                            ->required()
                            ->native(false)
                            ->closeOnDateSelection(),

                        Forms\Components\Select::make('country_id')
                            ->relationship('country', 'name')
                            ->preload()
                            ->searchable()
                            ->required(),
                        Forms\Components\Toggle::make('is_verified')
                            ->required(),
                    ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth')
                    ->date()
                    ->sortable(),
                SpatieMediaLibraryImageColumn::make('image')
                    ->label('Avatar')
                    ->collection('authors')
                    ->circular(),
                SpatieMediaLibraryImageColumn::make('cover')
                    ->collection('author-cover'),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_verified')
                    ->boolean(),
                Tables\Columns\TextColumn::make('country.name')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }
}
