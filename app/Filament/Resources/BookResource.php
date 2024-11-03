<?php

namespace App\Filament\Resources;

use App\Filament\NavigationGroups;
use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = NavigationGroups::CONTENT;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        // Main Content Group (2 columns wide)
                        Forms\Components\Group::make()
                            ->schema([
                                // Basic Information
                                Forms\Components\TextInput::make('name')
                                    ->label('Book Title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                Forms\Components\Textarea::make('description')
                                    ->required(),

                                Forms\Components\MarkdownEditor::make('content')
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->columnSpan(2),

                        // Sidebar Information (1 column wide)
                        Forms\Components\Group::make()
                            ->schema([
                                // Authors and Series
                                Forms\Components\Select::make('user_id')
                                    ->relationship('user', 'id')
                                    ->preload()
                                    ->searchable()
                                    ->required()
                                    ->label('User'),

                                Forms\Components\Select::make('author_id')
                                    ->relationship('author', 'id')
                                    ->preload()
                                    ->searchable()
                                    ->required(),

                                Forms\Components\Select::make('series_id')
                                    ->relationship('series', 'name')
                                    ->preload()
                                    ->searchable()
                                    ->default(null),

                                // ISBN Information
                                Forms\Components\TextInput::make('isbn')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('isbn13')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->columnSpan(1),

                        // Additional Details (2 columns wide)
                        Forms\Components\Group::make()
                            ->schema([
                                // Tags and Media
                                Forms\Components\TagsInput::make('tags')
                                    ->required()
                                    ->columnSpanFull(),

                                SpatieMediaLibraryFileUpload::make('image')
                                    ->collection('books')
                                    ->image()
                                    ->required()
                                    ->columnSpanFull(),

                                // Book Details
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('pages')
                                            ->required()
                                            ->numeric(),

                                        Forms\Components\DatePicker::make('publication_date')
                                            ->required(),
                                    ]),

                                Forms\Components\TextInput::make('file')
                                    ->maxLength(255)
                                    ->default(null),

                                Forms\Components\Toggle::make('status')
                                    ->required()
                                    ->default(true),
                            ])
                            ->columnSpan(2),
                    ])
                    ->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('series.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('isbn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isbn13')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('publication_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pages')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('file')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
