<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;

    public function answers()
    {
        return $this->hasMany(answer::class);
    }

    public function point_category()
    {
        return $this->belongsTo(point_category::class);
    }
}
