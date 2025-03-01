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
use Filament\Support\Enums\IconSize;
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

    protected static ?string $recordTitleAttribute = "name";

    public static function getModelLabel(): string
    {
        return __("Book");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__("Book name"))
                                    ->placeholder(__("Name..."))
                                    ->required()
                                    ->columnSpanFull()
                                    ->maxLength(255),


                                Forms\Components\TagsInput::make('keywords')
                                    ->required()
                                    ->splitKeys(['Enter', ',', '،'])
                                    ->separator(',')
                                    ->nestedRecursiveRules([
                                        'min:3',
                                        'max:70',
                                    ])
                                    ->columnSpanFull(),

                                Forms\Components\Select::make('language_id')
                                    ->label('Language')
                                    ->relationship('language', 'name')
                                    ->preload()
                                    ->searchable()
                                    ->required(),

                                Forms\Components\Select::make('author_id')
                                    ->relationship('author', 'full_name')
                                    ->label('Author')
                                    ->createOptionForm(self::AuthorForm())
                                    ->createOptionModalHeading(__("Create new Author"))
                                    ->preload()
                                    ->searchable()
                                    ->required(),

                                Forms\Components\TextInput::make('pages')
                                    ->numeric(),

                                Forms\Components\DatePicker::make('published_date')
                                    ->native(false)
                                    ->default(now()),

                                Forms\Components\TextInput::make('isbn')
                                    ->label(__("ISBN"))
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('isbn13')
                                    ->label(__("ISBN13"))
                                    ->maxLength(255),


                            ])
                            ->columns(2)
                            ->columnSpan(2),

                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Select::make('series_id')
                                    ->relationship('series', 'name')
                                    ->preload()
                                    ->createOptionForm(self::SeriesForm())
                                    ->createOptionModalHeading(__("Create new Series"))
                                    ->searchable()
                                    ->default(null),

                                Forms\Components\FileUpload::make('image')
                                    ->required()
                                    ->image(),

                                Forms\Components\FileUpload::make('file')
                                    ->acceptedFileTypes(['application/pdf']),

                                Forms\Components\Toggle::make('status')
                                    ->required()
                                    ->default(true),
                            ])->columnSpan(1),
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Textarea::make('description')
                                    ->rows(4)
                                    ->columnSpanFull()
                                    ->required(),
                                Forms\Components\Group::make()
                                    ->schema([
                                        Forms\Components\Toggle::make('use_markdown')
                                            ->label(__('Use Markdown Editor'))
                                            ->live(),

                                        Forms\Components\MarkdownEditor::make('content')
                                            ->label('Markdown Content')
                                            ->required(fn($get) => $get('use_markdown') === true)
                                            ->columnSpanFull()
                                            ->visible(fn($get) => $get('use_markdown') === true),

                                        Forms\Components\RichEditor::make('content')
                                            ->label('Rich Text Content')
                                            ->required(fn($get) => $get('use_markdown') === false)
                                            ->columnSpanFull()
                                            ->visible(fn($get) => $get('use_markdown') === false)
                                    ])->columnSpanFull(),

                            ])->columnSpan(2),



                    ])
                    ->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__("Image")),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.full_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('isbn')
                    ->placeholder("__")
                    ->searchable(),
                Tables\Columns\TextColumn::make('pages')
                    ->badge()
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
                Tables\Actions\EditAction::make()
                    ->label(false)
                    ->tooltip(__("Edit"))
                    ->iconSize(IconSize::Medium),
                Tables\Actions\Action::make('view-demo')
                    ->icon('heroicon-o-rocket-launch')
                    ->openUrlInNewTab()
                    ->iconSize(IconSize::Medium)
                    ->label(false)
                    ->tooltip(__("View"))
                    ->url(function ($record) {
                        return route('books.show', $record->slug);
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function SeriesForm()
    {
        return [
            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label(__("Series"))
                        ->required()
                        ->maxLength(255),
                    Forms\Components\SpatieTagsInput::make('tags')
                        ->label(__("Keywords")),

                    Forms\Components\RichEditor::make('description')
                        ->label(__("Description"))
                        ->columnSpanFull()
                        ->required(),

                    Forms\Components\Toggle::make('status')
                        ->inline(false)
                        ->label(__("Status"))
                        ->required(),

                ])->columns(2)
        ];
    }




    public static function AuthorForm()
    {
        return [
            Forms\Components\Section::make()
                ->schema([

                    Forms\Components\FileUpload::make('image')
                        ->image()
                        ->avatar()
                        ->columnSpanFull()
                        ->label(false)
                        ->alignCenter(),
                    Forms\Components\TextInput::make('full_name')
                        ->label(__("Author name"))
                        ->required()
                        ->unique()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('birth')
                        ->label(__("Birth"))
                        ->native(false)
                        ->maxDate(now()->subYear(20)),
                    Forms\Components\Select::make('country_id')
                        ->searchable()
                        ->preload()
                        ->label(__("Country"))
                        ->relationship('country', 'name'),
                    Forms\Components\Toggle::make('is_verified')
                        ->inline(false)
                        ->label(__("Verified")),
                    Forms\Components\RichEditor::make('description')
                        ->label(__("Description"))
                        ->columnSpanFull(),

                ])->columns(2)
        ];
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
