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
                                    ->maxLength(255),
                                Forms\Components\TagsInput::make('tags')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('pages')
                                    ->required()
                                    ->numeric(),

                                Forms\Components\DatePicker::make('publication_date')
                                    ->native(false)
                                    ->required(),



                                Forms\Components\Toggle::make('status')
                                    ->required()
                                    ->default(true),
                                Forms\Components\Textarea::make('description')
                                    ->columnSpanFull()
                                    ->required(),
                                Forms\Components\MarkdownEditor::make('content')
                                    ->required()
                                    ->columnSpanFull(),

                            ])
                            ->columns(2)
                            ->columnSpan(2),

                        Forms\Components\Section::make()
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->collection('books')
                                    ->image()
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('file'),
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

                                // ISBN Information
                                Forms\Components\TextInput::make('isbn')
                                    ->required()
                                    ->maxLength(255)
                                    ->hintAction(
                                        Forms\Components\Actions\Action::make('Generate')
                                            ->color('primary')
                                            ->size('sm')
                                            ->action(function ($set) {
                                                $set('isbn', sprintf('%09dX', random_int(100000000, 999999999)));
                                            })
                                    ),

                                Forms\Components\TextInput::make('isbn13')
                                    ->required()
                                    ->maxLength(255)
                                    ->hintAction(
                                        Forms\Components\Actions\Action::make('Generate')
                                            ->color('primary')
                                            ->size('sm')
                                            ->action(function ($set) {
                                                $set('isbn13', sprintf('%013d', random_int(1000000000000, 9999999999999)));
                                            })
                                    ),
                            ])
                            ->columnSpan(1),

                        // Additional Details (2 columns wide)
                        Forms\Components\Group::make()
                            ->schema([
                                // Tags and Media
                                Forms\Components\SpatieTagsInput::make('tags')
                                    ->columnSpanFull(),

                                SpatieMediaLibraryFileUpload::make('image')
                                    ->collection('books-cover')
                                    ->image()
                                    ->imageEditor()
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

                                Forms\Components\FileUpload::make('file')
                                    ->label("Book file")
                                    ->disk("public")
                                    ->directory("books")
                                    ->visibility("public")
                                    ->acceptedFileTypes(["application/pdf"])
                                    ->maxSize(49152)
                                    ->maxFiles(1)
                                    ->downloadable()
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(
                                            TemporaryUploadedFile $file
                                        ): string => (string) str(
                                            $file->getClientOriginalName()
                                        )->prepend(now()->timestamp . "-")
                                    )
                                    ->columnSpan([
                                        "sm" => 1,
                                        "lg" => 2,
                                    ]),

                                Forms\Components\Toggle::make('status')
                                    ->label('Published')
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
                Tables\Columns\TextColumn::make('publication_date')
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
