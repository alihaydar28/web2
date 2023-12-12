<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Teacher;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $defaultTeacher = Teacher::first();

        if ($defaultTeacher) {
            $assignedClasses = $defaultTeacher->class;

            return view('dashboard', compact('assignedClasses'));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Inside your TeacherController.php

    public function showQuizzes($classId)
    {
        $quizzes = Quiz::where('class_id', $classId)->get();

        return view('showquizzes', ['quizzes' => $quizzes]);
    }

    public function showAssignments($classId)
    {
        $assignments = Assignment::where('class_id', $classId)->get();

        return view('showassignments', ['assignments' => $assignments]);
    }

}
