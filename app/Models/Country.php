<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function authors()
    {
        return $this->hasMany(Author::class);
    }
}
