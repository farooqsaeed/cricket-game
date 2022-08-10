<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    protected $fillable = [
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
        return $this->belongsTo(event::class);
    }
}
