<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class point_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'points'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
