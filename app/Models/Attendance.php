<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['courseclass_id', 'student_id', 'AttendanceDate', 'IsPresent'];
    use HasFactory;

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class,'courseclass_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
