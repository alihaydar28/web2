<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\Role;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\enrollment;
use App\Models\Student;
use Illuminate\Http\Request;


class EnrollmentController extends Controller
{
    public function enrollmentCourses()
    {
        $allCourses = Course::all();
        return view('student.enrollmentCourses')->with(['allCourses' => $allCourses]);
    }

    public function enrollmentClasses(int $courseId)
    {
        $course = Course::with('courseClasses')->find($courseId);
        $allClasses = $course->courseClasses;
        return view('student.enrollmentClasses')->with(['allClasses' => $allClasses, 'selectedCourse' => $course]);
    }

    /*
    public function enroll1(int $classId)
    {
        $studentRoleId = Role::where('name', 'student')->first()->id;

        if (auth()->user()->role_id != $studentRoleId) {
            return back()->with("message", "only students are allowed to enroll in classes!");
        }

        $user = auth()->user();
        $studentId = $user->student->id;

        $enrollment = new Enrollment();
        $enrollment->student_id = $studentId;
        $enrollment->class_id = $classId;
        $enrollment->save();

        return back()->with("success", "successfully enrolled!");
    }
    */

    public function enroll(int $classId)
    {
        $studentRoleId = Role::where('name', 'student')->first()->id;

        if (auth()->user()->role_id != $studentRoleId) {
            return back()->with("message", "Only students are allowed to enroll in classes!");
        }

        $user = auth()->user();
        $student = $user->student;
        $classes = $student->classes;

        foreach($classes as $class){
            $courseEnrolled = $class->course->id;
            $courseNotEnrolled = CourseClass::where('id', $classId)->value('course_id');
            if($courseNotEnrolled == $courseEnrolled){
                return back()->with("message", "You are already enrolled in a class for this course.");
            }
        }

        $enrollment = new Enrollment();
        $enrollment->student_id = $student->id;
        $enrollment->class_id = $classId;
        $enrollment->save();

        return back()->with("success", "Successfully enrolled!");
    }


    public function drop(int $classId)
    {
        $user = auth()->user();
        $studentId = $user->student->id;

        $enrollment = Enrollment::where('student_id', $studentId)
            ->where('class_id', $classId)
            ->first();

        if ($enrollment) {
            $enrollment->delete();
            return back()->with("success", "Successfully dropped the class!");
        }

        return back()->with("message", "You are not enrolled in this class.");
    }
}
