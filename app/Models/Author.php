<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Author extends Model
{
    protected $fillable = [
        "user_id",
        "full_name",
        "birth",
        "cover",
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
}
