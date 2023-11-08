<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stamp extends Model
{
    use HasFactory;

    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }
}
