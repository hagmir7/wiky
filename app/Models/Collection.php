<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Collection extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = 'collections';
    protected $fillable = [
        "title",
        "description",
    ];


    public function save_book(): MorphOne
    {
        return $this->morphOne(Save::class, 'saveable');
    }

    public function books():BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_collection');
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'collection_categories');
    }

    public function registerMediaCollection(): void
    {
        $this->addMediaCollection('collections-cover');
    }

}
