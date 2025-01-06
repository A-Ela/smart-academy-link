<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ParentImport;
use App\Models\parents;
use App\Models\students;
use Maatwebsite\Excel\Facades\Excel;

class parentManagerController extends Controller
{
    //* functions to get the form view
    public function manual() {
        //* pass student info to parents add manually page   
        $students = students::all();
        return view('admin-subsystem.page-views.parent-pages.add-parent-pages.addParentManualy', compact('students'));
    }

    public function document() { 
        return view("admin-subsystem.page-views.parent-pages.add-parent-pages.addParentDocument");
    }
    
    //* function to add parents
    public function store(Request $request)
    {       
        //* if adding by document
        if ($request->hasFile('document')) {
            // Validate the uploaded document
            $request->validate([
                'document' => 'required|mimes:csv,xlsx,xls|max:2048', // Limit file size and type
            ]);

            // Handle the file upload and import the data
            $file = $request->file('document');
            Excel::import(new ParentImport, $file); // Use the import class

            return redirect()->back()->with('success', 'Parents and their students have been successfully added.');
        }
        
        //* if adding manually
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:parents', // Ensure email is unique in the parents table
            'password' => 'required|string|min:8',
            'student_ids' => 'required|array', // Array of student IDs
            'student_ids.*' => 'exists:students,studentID', // Ensure all provided student IDs exist
        ]);

        // Hash the password before saving
        $validated['password'] = bcrypt($validated['password']);

        // Create the parent record
        $parent = parents::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        // Attach students to the parent using the pivot table
        $parent->students()->attach($validated['student_ids']);

        return redirect()->route('parent-list')->with('success', 'Parent and student associations added successfully!');
    }

    //* show specific parent info
    public function show($parentID) {
        $parent = parents::findOrFail($parentID);
        return view('admin-subsystem.page-views.parent-pages.parentView', compact('parent'));
    }

    //* remove parent
    public function destroy($id) {
        
    }
}
