<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class AdminCourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'CourseCode' => 'required|max:255',
            'CourseName' => 'required|string|max:255',
            'CourseDescription' => 'required|string',
            'CourseCredit' => 'required|string',
            
        ]);

        $course = new Course();
            
            $course->CourseCode = $request->input('CourseCode');
            $course->CourseName =   $request->input('CourseName');
            $course->CourseDescription= $request->input('CourseDescription');
            $course->CourseCredit =$request->input('CourseCredit');
        

            $course->save();
        

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // Add more validation rules as needed
        ]);

        $course->update($request->all());

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully');
    }

}
