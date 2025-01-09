<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    // Show the form for creating homework
    public function create()
    {
        return view('homework.create');
    }

    // Store the homework data in the database
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'due_date' => 'required|date',
            'subject_name' => 'required',
            'class_id' => 'required',
        ]);

        Homework::create([
            'description' => $request->description,
            'due_date' => $request->due_date,
            'subject_name' => $request->subject_name,
            'class_id' => $request->class_id,
        ]);

        return redirect()->route('homework.index')->with('success', 'Homework assigned successfully');
    }

    // Show the form for editing the homework
    public function edit($id)
    {
        $homework = Homework::findOrFail($id);
        return view('homework.edit', compact('homework'));
    }

    // Update the homework data in the database
    public function update(Request $request, $id)
    {
        $homework = Homework::findOrFail($id);

        $request->validate([
            'description' => 'required',
            'due_date' => 'required|date',
            'subject_name' => 'required',
            'class_id' => 'required',
        ]);

        $homework->update([
            'description' => $request->description,
            'due_date' => $request->due_date,
            'subject_name' => $request->subject_name,
            'class_id' => $request->class_id,
        ]);

        return redirect()->route('homework.create')->with('success', 'Homework updated successfully');
    }

    // Delete a homework assignment
    public function destroy($id)
    {
        $homework = Homework::findOrFail($id);
        $homework->delete();

        return redirect()->route('homework.create')->with('success', 'Homework deleted successfully');
    }

    // List all homework assignments
    public function index()
    {
        $homeworks = Homework::all();  // Fetch all homework assignments from the database
        return view('homework.index', compact('homeworks'));  // Pass the homework data to the view
    }

    // View the list of all homework assignments
    public function list()
    {
        // Fetch all homework records
        $homeworks = Homework::all(); // Ensure you have a Homework model

        // Return to the Blade view with data
        return view('homework.list', compact('homeworks'));
    }
}




