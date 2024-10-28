<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'author_id',
        'series_id',
        'description',
        'content',
        'tags',
        'isbn',
        'isbn13',
        'image',
        'publication_date',
        'pages',
        'file',
        'slug',
        'status'
    ];

    protected $casts = [
        'publication_date' => 'date',
        'status' => 'boolean',
        'tags' => 'array',
        'pages' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function quotes()
    {
        return $this->belongsToMany(Quote::class);
    }
}
