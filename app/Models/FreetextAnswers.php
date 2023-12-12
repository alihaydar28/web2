<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreetextAnswers extends Model
{
    use HasFactory;

    protected $fillable = [
        'AnswerText'
        ];
    public function question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
}
