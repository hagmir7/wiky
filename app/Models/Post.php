<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTags;
    protected $fillable = [
        'title',
        'user_id',
        'description',
        'book_id',
        'content',
        'slug',
        'tags',
        'reading_time',
        'status',
        'deleted_by',
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('posts-cover')
            ->singleFile()
            ->useFallbackUrl(asset('assets/images/default-post-cover.webp'));
    }
}
