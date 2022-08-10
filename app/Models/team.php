<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->belongsToMany(event::class);
    }

    public function players()
    {
        return $this->hasMany(player::class);
    }
}
