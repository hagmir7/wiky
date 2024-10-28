<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        "name",
        "slug",
        "tags",
        "description",
    ];

    protected $casts = [
        'tags' => 'array',
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
