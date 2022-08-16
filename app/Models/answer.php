<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
		'user_id',
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
}


