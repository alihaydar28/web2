<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alumni;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::all();
        return view('alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'dateofbirth' => 'nullable|date',
            'email' => 'required|email|unique:alumni',
            'password' => 'required|min:8',
        ]);

        $alumni = Alumni::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'gender' => $request->input('gender'),
            'dateofbirth' => $request->input('dateofbirth'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('alumni.index')->with('success', 'Alumni created successfully');
    }

    public function show(Alumni $alumni)
    {
        return view('alumni.show', compact('alumni'));
    }

    public function edit(Alumni $alumni)
    {
        return view('alumni.edit', compact('alumni'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'dateofbirth' => 'nullable|date',
            'email' => 'required|email|unique:alumni,email,' . $alumni->id,
        ]);

        $alumni->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'gender' => $request->input('gender'),
            'dateofbirth' => $request->input('dateofbirth'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('alumni.index')->with('success', 'Alumni updated successfully');
    }

    public function destroy(Alumni $alumni)
    {
        $alumni->delete();
        return redirect()->route('alumni.index')->with('success', 'Alumni deleted successfully');
    }
}
