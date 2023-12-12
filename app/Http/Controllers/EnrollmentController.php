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
        $userId = auth()->user()->id;
        $student = Student::where('user_id', $userId)->first();
        $classes = $student->classes;

        $course = Course::with('courseClasses')->find($courseId);
        $allClasses = $course->courseClasses;

        return view('student.enrollmentClasses')->with(['allClasses' => $allClasses, 'selectedCourse' => $course ,'classes'=>$classes]);
    }

    public function enroll(int $classId)
    {
        $classToEnroll = CourseClass::find($classId);
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

        foreach($classes as $class){

            $classesDay=$class->ClassDay;
            $classToEnrollDay=$class->ClassDay;

            if($classesDay == $classToEnrollDay){
                $classesTime= $class->ClassTime;
                $classToEnrollTime=$classToEnroll->ClassTime;
                if($classesTime == $classToEnrollTime){
                    return back()->with("message", "Schedule conflict! You are already enrolled in a class at the same time.");
                }
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
