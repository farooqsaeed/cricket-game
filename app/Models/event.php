<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    public function schedules()
    {
        return $this->hasMany(schedule::class);
    }

    public function teams()
    {
        return $this->belongsToMany(team::class);
    }
}
