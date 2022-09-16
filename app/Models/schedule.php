<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'M_type',
        'team_1',
        'team_2',
        'date_at',
        'time_at',
        'avenue',
        'event_id',
        'time_stamp'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function gamers() {

        return $this->belongsToMany(Gamer::class,'gamer_schedules'); 

    }
}
