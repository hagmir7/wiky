<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Collection extends Model
{
    use HasFactory;
    protected $table = 'collections';
    protected $fillable = [
        "title",
        "image",
        "description",
    ];


    public function save_book(): MorphOne
    {
        return $this->morphOne(Save::class, 'saveable');
    }

    public function books():BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_collections');
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'collection_categories');
    }

}
