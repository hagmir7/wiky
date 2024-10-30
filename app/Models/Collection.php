<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Collection extends Model
{
    protected $fillable = [
        "title",
        "image",
        "description",
    ];


    public function save_book(): MorphOne
    {
        return $this->morphOne(SaveBook::class, 'saveable');
    }

    public function books():BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

}
