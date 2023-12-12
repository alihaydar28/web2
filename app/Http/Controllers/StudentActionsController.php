<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentActionsController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        $student = Student::where('user_id', $userId)->first();

        if ($student) {
            $classes = $student->classes;

            return view('student.studentDashboard')->with('classes', $classes);
        } else {
            return view('student.studentDashboard')->with('classes', []);
        }
    }

    public function studentAttendance()
    {
        $userId = auth()->user()->id;
        $student = Student::where('user_id', $userId)->first();

        $absentAttendance = $student->attendances()->where('isPresent', 0)->get();

        return view('student.studentAttendance')->with('attendance', $absentAttendance);
    }
}
