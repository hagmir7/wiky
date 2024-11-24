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
                                Forms\Components\TextInput::make('isbn')
                                    ->required()
                                    ->label(__("ISBN"))
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('isbn13')
                                    ->label(__("ISBN13"))
                                    ->required()
                                    ->maxLength(255),
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
                                Forms\Components\Select::make('author_id')
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

                                // ISBN Information



                            ])
                            ->columnSpan(1)
                    ])
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
