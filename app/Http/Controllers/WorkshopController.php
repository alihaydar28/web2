<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Workshop;
use App\Models\Alumni;

class WorkshopController extends Controller
{
    public function index(Alumni $alumni)
    {
        $workshops = $alumni->workshops;
        return view('alumni.workshops.index', compact('alumni', 'workshops'));
    }

    public function create(Alumni $alumni)
    {
        return view('alumni.workshops.create', compact('alumni'));
    }

    public function store(Request $request, Alumni $alumni)
    {
        $request->validate([
            'WorkshopName' => 'required|string|max:255',
            'WorkshopDecription' => 'nullable|string',
            'WorkshopDateAndTime' => 'nullable|date',
            'WorkshopLocation' => 'nullable|string',
            'accepted' => 'required|boolean',
            // Add other validation rules as needed
        ]);

        $workshop = $alumni->workshops()->create([
            'WorkshopName' => $request->input('WorkshopName'),
            'WorkshopDecription' => $request->input('WorkshopDecription'),
            'WorkshopDateAndTime' => $request->input('WorkshopDateAndTime'),
            'WorkshopLocation' => $request->input('WorkshopLocation'),
            'accepted' => $request->input('accepted'),
            // Add other fields as needed
        ]);

        return redirect()->route('alumni.workshops.index', $alumni)->with('success', 'Workshop created successfully');
    }

    public function show(Alumni $alumni, Workshop $workshop)
    {
        return view('alumni.workshops.show', compact('alumni', 'workshop'));
    }

    public function edit(Alumni $alumni, Workshop $workshop)
    {
        return view('alumni.workshops.edit', compact('alumni', 'workshop'));
    }

    public function update(Request $request, Alumni $alumni, Workshop $workshop)
    {
        $request->validate([
            'WorkshopName' => 'required|string|max:255',
            'WorkshopDecription' => 'nullable|string',
            'WorkshopDateAndTime' => 'nullable|date',
            'WorkshopLocation' => 'nullable|string',
            'accepted' => 'required|boolean',
            // Add other validation rules as needed
        ]);

        $workshop->update([
            'WorkshopName' => $request->input('WorkshopName'),
            'WorkshopDecription' => $request->input('WorkshopDecription'),
            'WorkshopDateAndTime' => $request->input('WorkshopDateAndTime'),
            'WorkshopLocation' => $request->input('WorkshopLocation'),
            'accepted' => $request->input('accepted'),
            // Add other fields as needed
        ]);

        return redirect()->route('alumni.workshops.index', $alumni)->with('success', 'Workshop updated successfully');
    }

    public function destroy(Alumni $alumni, Workshop $workshop)
    {
        $workshop->delete();
        return redirect()->route('alumni.workshops.index', $alumni)->with('success', 'Workshop deleted successfully');
    }
}
