<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Series extends Model
{
    use HasFactory, HasTags;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
