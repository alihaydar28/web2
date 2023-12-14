<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminStudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
       // $this->validateStudent($request);

        // Create a user
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

            $student = new Student();
            $student->user_id = $user->id;
            $student->parents_id = 1;

            $student->save();

       // $user->student()->create([ 
      //]);

        // Redirect to the index page or show success message
        return redirect()->route('admin.students.index');
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $this->validateStudent($request, $student);

        // Update the associated user
        $student->user->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'gender' => $request->input('gender'),
            //'dateofbirth' => $request->input('dateofbirth'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'current_address' => $request->input('current_address')
        ]);

        // Update student fields
        $student->update([
            // Update student fields as needed
        ]);

        // Redirect to the index page or show success message
        return redirect()->route('admin.students.index');
    }

    public function destroy(Student $student)
    {
        // Delete the associated user
        $student->user->delete();

        // Delete the student record
        $student->delete();

        // Redirect to the index page or show success message
        return redirect()->route('admin.students.index');
    }

    private function validateStudent(Request $request, $student = null)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($student ? $student->user->id : null),
            ],
            'password' => 'required|string|min:8',
            // Add other validation rules as needed
        ];

        // Validate the request
        $request->validate($rules);
    }
}
