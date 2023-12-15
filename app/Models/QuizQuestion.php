<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'QuestionText',
        'IsMCQ',
        'IsTrueFalse',
        'IsFreeText',
        'QuestionGrade',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function mcqChoices()
    {
        return $this->hasMany(Mcqchoices::class, 'question_id');
    }

    public function trueFalseAnswer()
    {
        return $this->hasOne(TruefalseAnswers::class,'question_id');
    }

    public function freeTextAnswer()
    {
        return $this->hasOne(FreetextAnswers::class,'question_id');
    }

    public function studentAnswers()
    {
        return $this->hasMany(StudentAnswer::class, 'question_id');
    }
}
