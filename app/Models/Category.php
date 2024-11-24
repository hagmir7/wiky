<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Category extends Model
{
    use HasFactory, HasTags;
    protected $fillable = [
        "name",
        "slug",
        "description",
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
