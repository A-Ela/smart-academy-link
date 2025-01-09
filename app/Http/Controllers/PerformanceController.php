<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performance; // Ensure you have a Performance model

class PerformanceController extends Controller
{
    // Display a listing of all performances
    public function index()
    {
        $performances = Performance::all();
        return view('teacher-subsystem.performance.index', compact('performances'));
    }

    // Show the form for creating a new performance
    public function create()
    {
        return view('teacher-subsystem.performance.create');
    }

    // Store a newly created performance in storage
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        Performance::create([
            'student_name' => $request->student_name,
            'subject' => $request->subject,
            'score' => $request->score,
        ]);

        return redirect()->route('teacher-subsystem.performance.index')->with('success', 'Performance record added successfully!');
    }

    // Show the form for editing the specified performance
    public function edit($id)
    {
        $performance = Performance::findOrFail($id);
        return view('teacher-subsystem.performance.edit', compact('performance'));
    }

    // Update the specified performance in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        $performance = Performance::findOrFail($id);
        $performance->update([
            'student_name' => $request->student_name,
            'subject' => $request->subject,
            'score' => $request->score,
        ]);

        return redirect()->route('performance.index')->with('success', 'Performance record updated successfully!');
    }

    // Remove the specified performance from storage
    public function destroy($id)
    {
        $performance = Performance::findOrFail($id);
        $performance->delete();

        return redirect()->route('teacher-subsystem.performance.index')->with('success', 'Performance record deleted successfully!');
    }
}
