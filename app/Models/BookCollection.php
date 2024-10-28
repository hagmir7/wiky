<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCollection extends Model
{
    protected $fillable = [
        'book_id',
        'collection_id',
    ];
}
