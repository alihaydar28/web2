<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id', 'student_id', 'mcq_id', 'truefalse_id', 'FreeTextAnswer',
    ];

    public function question()
    {
        return $this->belongsTo(QuizQuestion::class, 'question_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function mcqChoice()
    {
        return $this->belongsTo(Mcqchoices::class, 'mcq_id');
    }

    public function trueFalseAnswer()
    {
        return $this->belongsTo(TruefalseAnswers::class, 'truefalse_id');
    }

}
