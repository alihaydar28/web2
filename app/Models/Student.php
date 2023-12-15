<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent()
    {
        return $this->belongsTo(Parents::class);
    }

    public function studentAnswers()
    {
        return $this->hasMany(StudentAnswer::class, 'student_id');
    }

    public function classes()
    {
        return $this->belongsToMany(CourseClass::class, 'enrollments', 'student_id', 'class_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }
}
