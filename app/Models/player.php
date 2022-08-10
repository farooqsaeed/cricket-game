<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class player extends Model
{
    use HasFactory;

    protected $fillable = [
		'team_id',
		'name',
		'photo'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function team()
    {
        return $this->belongsTo(team::class);
    }
}
