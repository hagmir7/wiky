<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'description',
        'tags',
        'book_id',
        'image',
        'content',
        'slug',
    ];

    protected $casts = [
        'tags' => 'array'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function book():BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }
}
