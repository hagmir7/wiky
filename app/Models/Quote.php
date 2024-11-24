<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Quote extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'book_id',
        'status',
        'quote',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function books():BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_quote');
    }
}
