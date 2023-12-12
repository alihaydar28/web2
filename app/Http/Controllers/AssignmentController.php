<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assignment');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {

        $request->validate([
            'class_id' => 'required|exists:course_classes,id',
            'assignment_name' => 'required|string|max:255',
            'assignment_description' => 'nullable|string',
            'assignment_start_date' => 'nullable|date',
            'assignment_end_date' => 'nullable|date|after:assignment_start_date',
        ]);

        $data = new Assignment();
        $data->class_id = $request->class_id;
        $data->assignment_name = $request->assignment_name;
        $data->assignment_description = $request->assignment_description;
        $data->assignment_start_date = $request->assignment_start_date;
        $data->assignment_end_date = $request->assignment_end_date;
        $newFilePath=time().'.'.$request->file('file_path')->extension();
        $request->file('file_path')->move(public_path('files'),$newFilePath);
        $data->file_path=$newFilePath;

        $data->save();

        return redirect()->route('Teacher.index');
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
    public function edit($id)
    {
        $data = Assignment::find($id);

        return view('editAssignment')->with('myeditdata', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'assignment_name' => 'required|string|max:255',
            'assignment_description' => 'nullable|string',
            'assignment_start_date' => 'nullable|date',
            'assignment_end_date' => 'nullable|date|after:assignment_start_date',
        ]);

        $assignment = Assignment::findOrFail($id);

        $assignment->assignment_name = $request->input('assignment_name');
        $assignment->assignment_description = $request->input('assignment_description');
        $assignment->assignment_start_date = $request->input('assignment_start_date');
        $assignment->assignment_end_date = $request->input('assignment_end_date');

        if ($request->hasFile('file_path')) {
            $newFilePath = time() . '.' . $request->file('file_path')->extension();
            $request->file('file_path')->move(public_path('files'), $newFilePath);
            $assignment->file_path = $newFilePath;
        }

        $assignment->save();

        return redirect()->route('Teacher.index')->with('success', 'Assignment updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);

        $assignment->delete();

        return redirect()->route('Teacher.index')
            ->with('success', 'Quiz deleted successfully');
    }

}
