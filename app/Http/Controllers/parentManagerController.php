<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admins;
use App\Models\students;
use App\Models\className;
use App\Models\teachers;
use App\Models\parents;
use Maatwebsite\Excel\Facades\Excel;

class parentManagerController extends Controller
{
    
     //* functions to get the form view
     public function manual() {
        return view("admin-subsystem.page-views.parent-pages.add-parent-pages.addParentManualy");
    }
    public function document() { 
        return view("admin-subsystem.page-views.parent-pages.add-parent-pages.addParentDocument");
    }
    
    //* function to add parents
    public function addParent(Request $request)
    {       
        //* if adding by document
        if ($request->hasFile('document')) {
            // Validate the uploaded document
        $request->validate([
            'document' => 'required|mimes:csv,xlsx,xls|max:2048', // Limit file size and type
        ]);

        // Handle the file upload and import the data
        $file = $request->file('document');
        Excel::import(new ParentsImport, $file); // Use the import class

        return redirect()->back()->with('success', 'Parents and their students have been successfully added.');
        }
        
        //* if adding by manually
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

        return redirect()->back()->with('success', 'Parent and student associations added successfully!');
            
    }

    //* remove parent
    public function destroy($id) {
        
    }
}
