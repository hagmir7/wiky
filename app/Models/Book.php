<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTags;
    protected $fillable = [
        'name',
        'user_id',
        'author_id',
        'series_id',
        'description',
        'content',
        'isbn',
        'isbn13',
        'publication_date',
        'pages',
        'file',
        'slug',
        'status'
    ];

    protected $casts = [
        'publication_date' => 'date',
        'status' => 'boolean',
        'pages' => 'integer'
    ];


    public function save_book(): MorphOne
    {
        return $this->morphOne(Save::class, 'saveable');
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'book_collection');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function quotes(): BelongsToMany
    {
        return $this->belongsToMany(Quote::class, 'book_quote');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('books-cover');
    }
}
