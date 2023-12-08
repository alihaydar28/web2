<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function mcqChoices()
    {
        return $this->hasMany(Mcqchoices::class);
    }

    public function trueFalseAnswer()
    {
        return $this->hasOne(TruefalseAnswers::class);
    }

    public function freeTextAnswer()
    {
        return $this->hasOne(FreetextAnswers::class);
    }

    public function studentAnswers()
    {
        return $this->hasMany(StudentAnswer::class, 'question_id');
    }
}
