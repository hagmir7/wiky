<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Author extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = [
        "user_id",
        "full_name",
        "birth",
        "description",
        "slug",
        "is_verified",
        "country_id",
    ];

    protected $casts = [
        'birth' => 'date',
        'verified' => 'boolean'
    ];
    
    public function user (): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function country():BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('authors-avatar');
        $this->addMediaCollection('authors-cover');
    }
}
