<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AdminTeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        

        $user = new User();
    

            $user->firstname = $request->input('firstname');
            $user->lastname =   $request->input('lastname');
            $user->gender= $request->input('gender');
            $user->dateofbirth =$request->input('dateofbirth');
            $user->email =$request->input('email');
            $user->password =$request->input('password');
            $user->phone =$request->input('phone');
            $user->current_address =$request->input('current_address');
            $user->role_id =$request->input('role_id');

            $user->save();

            $teacher = new Teacher();
            $teacher->user_id = $user->id;
            

            $teacher->save();

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher created successfully');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        $teacher->update($request->all());

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated successfully');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher deleted successfully');
    }
}
