<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'Country_id','state','state_code'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function countries()
    {
        return $this->belongsTo(Country::class);
    }
}
