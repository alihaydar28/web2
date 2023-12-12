<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enrollment extends Model
{
    use HasFactory;

    public static function isEnrolled($studentId, $classId)
    {
        return self::where('student_id', $studentId)->where('class_id', $classId)->exists();
    }
}
