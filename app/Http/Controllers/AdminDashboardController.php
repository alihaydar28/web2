<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Parents;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Course;


class AdminDashboardController extends Controller
{
    public function count()
    {
        return view('dashboard.admin');
    }

    public function index()
    {
        // Count the total number of students
        $totalStudents = Student::count();

        // Count the total number of teachers
        $totalTeachers = Teacher::count();

        // Count the total number of courses
        $totalCourses = Course::count();


        return view('dashboard.admin', compact('totalStudents', 'totalTeachers', 'totalCourses'));
    }
}
