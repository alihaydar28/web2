<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcqchoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'question_id',
        'ChoiceText',
        'IsCorrect',
    ];
    public function question()
    {
        return $this->belongsTo(QuizQuestion::class,'question_id');
    }
    public function studentAnswers()
    {
        return $this->hasMany(StudentAnswer::class, 'mcq_id');
    }
}
