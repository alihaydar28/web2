<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentActionsController extends Controller
{
    public function index(){
        $userId = auth()->user()->id;

        $student = Student::where('user_id', $userId)->first();

        if ($student) {
            $classes = $student->classes;

            return view('student.dashboard')->with('classes', $classes);
        } else {
            return view('student.dashboard')->with('classes', []);
        }

    }
}
