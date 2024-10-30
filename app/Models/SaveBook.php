<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SaveBook extends Model
{
    protected $fillable = ['user_id'];


    public function saveable(): MorphTo
    {
        return $this->morphTo();
    }
}
