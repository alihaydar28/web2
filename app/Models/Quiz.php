<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'QuizTitle',
        'QuizDescription',
        'QuizDateAndTime',
        'QuizDurationMin',

    ];

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
