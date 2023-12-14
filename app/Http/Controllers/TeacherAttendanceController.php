<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\CourseClass;

class TeacherAttendanceController extends Controller
{
    public function index($class_id)
    {
        $courseClass = CourseClass::findOrFail($class_id);
        $enrolledStudents = $courseClass->students;
        return view('attendance', compact('courseClass', 'enrolledStudents'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'courseclass_id' => 'required|exists:course_classes,id',
            'students' => 'required',
            'students.*' => 'exists:students,id',
        ]);
        $data = $request->input('attendance', []);

        foreach ($request->get('students') as $studentId) {
            $isPresent = isset($data[$studentId]);

            Attendance::updateOrCreate(
                [
                    'courseclass_id' => $request->input('courseclass_id'),
                    'student_id' => $studentId,
                    'AttendanceDate' => now()->toDateString(),
                ],
                ['IsPresent' => $isPresent]
            );
        }

        return redirect()->back()->with('success', 'Attendance recorded successfully.');
    }




}
