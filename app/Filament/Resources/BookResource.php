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
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = NavigationGroups::CONTENT;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Book Title')
                                    ->required()
                                    ->columnSpanFull()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn($state, Forms\Set $set) => $set('slug', Str::slug($state))),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                Forms\Components\SpatieTagsInput::make('tags')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('pages')
                                    ->required()
                                    ->numeric(),

                                Forms\Components\DatePicker::make('published_date')
                                    ->native(false)
                                    ->default(now())
                                    ->required(),
                                Forms\Components\TextInput::make('isbn')
                                    ->required()
                                    ->label(__("ISBN"))
                                    ->maxLength(255)
                                    ->hintAction(
                                        Forms\Components\Actions\Action::make('Generate')
                                            ->color('primary')
                                            ->size('sm')
                                            ->action(function (Forms\Set $set) {
                                                $set('isbn', sprintf('%09dX', random_int(100000000, 999999999)));
                                            })
                                    ),

                                Forms\Components\TextInput::make('isbn13')
                                    ->label(__("ISBN13"))
                                    ->required()
                                    ->maxLength(255)
                                    ->hintAction(
                                        Forms\Components\Actions\Action::make('Generate')
                                            ->color('primary')
                                            ->size('sm')
                                            ->action(function (Forms\Set $set) {
                                                $set('isbn13', sprintf('%013d', random_int(1000000000000, 9999999999999)));
                                            })
                                    ),
                                Forms\Components\Textarea::make('description')
                                    ->columnSpanFull()
                                    ->required(),
                                    Forms\Components\Group::make()
                                    ->schema([
                                        Forms\Components\Toggle::make('use_markdown')
                                            ->label('Use Markdown Editor')
                                            ->live(),

                                        Forms\Components\MarkdownEditor::make('content')
                                            ->label('Markdown Content')
                                            ->required(fn ($get) => $get('use_markdown') === true)
                                            ->columnSpanFull()
                                            ->visible(fn ($get) => $get('use_markdown') === true),

                                        Forms\Components\RichEditor::make('content')
                                            ->label('Rich Text Content')
                                            ->required(fn ($get) => $get('use_markdown') === false)
                                            ->columnSpanFull()
                                            ->visible(fn ($get) => $get('use_markdown') === false)
                                    ])->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->columnSpan(2),

                        Forms\Components\Section::make()
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->collection('books-cover')
                                    ->image()
                                    ->required()
                                    ->columnSpanFull(),

                                SpatieMediaLibraryFileUpload::make('file')
                                    ->collection('books-file')
                                    ->acceptedFileTypes(["application/pdf"]),

                                // Authors and Series
                                Forms\Components\Select::make('user_id')
                                    ->label('User')
                                    ->relationship('user', 'email')
                                    ->preload()
                                    ->searchable()
                                    ->required(),

                                Forms\Components\Select::make('author_id')
                                    ->relationship('author', 'full_name')
                                    ->label('Author')
                                    ->relationship('author', 'full_name')
                                    ->preload()
                                    ->searchable()
                                    ->required(),

                                Forms\Components\Select::make('series_id')
                                    ->relationship('series', 'name')
                                    ->preload()
                                    ->searchable()
                                    ->default(null),

                                Forms\Components\Toggle::make('status')
                                    ->required()
                                    ->default(true),
                            ])->columnSpan(1),
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
                Tables\Columns\TextColumn::make('user.email')
                    ->label('User Email')
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.full_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('series.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('isbn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isbn13')
                    ->searchable(),
                SpatieMediaLibraryImageColumn::make('image')
                    ->collection('books-cover'),
                Tables\Columns\TextColumn::make('published_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pages')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('file')
                    ->searchable(),
                Tables\Columns\SpatieTagsColumn::make('tags'),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Published'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('created_at', 'desc')
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
