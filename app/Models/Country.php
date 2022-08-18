<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','iso3','iso2'
    ];
    
    public function cities()
    {
        return  $this->hasMany(City::class);
    }
}
