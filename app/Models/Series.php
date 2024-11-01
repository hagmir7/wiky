<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'tags',
        'slug',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'tags' => 'array'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
