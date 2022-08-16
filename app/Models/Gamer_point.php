<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamer_point extends Model
{
    use HasFactory;

    protected $fillable = [
        'gamer_id',
        'points',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function gamer()
    {
        return $this->belongsTo(Gamer::class);
    }
}
