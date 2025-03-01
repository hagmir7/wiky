<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class Series extends Model
{
    use HasFactory, HasTags, HasSlug;


    protected $fillable = [
        'name',
        'description',
        'slug',
        'status'
    ];



    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('full_name')
            ->slugsShouldBeNoLongerThan(50)
            ->doNotGenerateSlugsOnUpdate()
            ->saveSlugsTo('slug');
    }

    protected $casts = [
        'status' => 'boolean',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
