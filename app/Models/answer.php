<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
		'gamer_id',
		'question_id',
		'respond_answer',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function point_category()
    {
        return $this->belongsTo(point_category::class);
    }
}


