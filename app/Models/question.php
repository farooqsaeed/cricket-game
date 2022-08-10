<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;

    protected $fillable = [
        'point_category_id',
		'Qn',
		'option_1',
		'option_2',
		'option_3',
		'option_4',
		'correct_option'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function answers()
    {
        return $this->hasMany(answer::class);
    }

    public function point_category()
    {
        return $this->belongsTo(point_category::class);
    }
}
