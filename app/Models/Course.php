<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function courseClasses()
    {
        return $this->hasMany(CourseClass::class);
    }

    protected $fillable = [
        'CourseCode',
        'CourseName',
        'CourseDescription',
        'CourseCredit',
    ];
}
