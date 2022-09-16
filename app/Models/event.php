<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
		'name',
		'M_type',
		'start_date',
        'end_date',
        'host_country'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function teams()
    {
        return  $this->hasMany(Team::class);
    }
}
