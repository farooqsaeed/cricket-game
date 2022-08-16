<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Gamer extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable = [
        'profile_image',
        'name',
        'nick',
        'city',
        'country',
        'phone',
        'fvt_team',
        'type'
    ];

    
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    

    public function gamer_point()
    {
        return $this->hasOne(Gamer_point::class);
    }
}
