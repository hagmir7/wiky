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
use Filament\Tables\Enums\FiltersLayout;
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
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                    ])->columnSpan(2),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Toggle::make('is_verified')
                            ->required(),
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
                SpatieMediaLibraryImageColumn::make('avatar')
                    ->collection('authors-avatar')
                    ->circular(),

                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('user.email')
                    ->label('User Email')
                    ->sortable(),

                Tables\Columns\TextColumn::make('birth')
                    ->date()
                    ->sortable(),

                SpatieMediaLibraryImageColumn::make('cover')
                    ->collection('authors-cover'),

                Tables\Columns\ToggleColumn::make('is_verified'),
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
                Tables\Filters\TernaryFilter::make('is_verified')
                    ->label('User Verification Status')
                    ->placeholder('Both')
                    ->trueLabel('Verified')
                    ->falseLabel('Unverified'),
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
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }
}
