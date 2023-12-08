<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruefalseAnswers extends Model
{
    use HasFactory;
    public function question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
    public function studentAnswers()
    {
        return $this->hasMany(StudentAnswer::class, 'truefalse_id');
    }
}
