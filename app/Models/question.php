<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'point_category_id',
		'Qn',
		'option_1',
		'option_2',
		'option_3',
		'option_4',
		'correct_option',
        'type',
        'timebound'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function point_category()
    {
        return $this->belongsTo(point_category::class);
    }

    public function schedules()
    {
        return $this->belongsToMany(schedule::class);
    }

    
}
