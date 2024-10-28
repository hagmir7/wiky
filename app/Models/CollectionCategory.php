<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionCategory extends Model
{
    protected $fillable = [
        'collection_id',
        'category_id',
    ];
}
