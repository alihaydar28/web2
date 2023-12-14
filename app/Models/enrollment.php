<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class enrollment extends Pivot
{
    use HasFactory;

    public static function isEnrolled($studentId, $classId)
    {
        return self::where('student_id', $studentId)->where('class_id', $classId)->exists();
    }
}
