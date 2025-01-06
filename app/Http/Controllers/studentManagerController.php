<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\students;
use App\Imports\StudentImport;
use App\Models\className;

class studentManagerController extends Controller
{
    //* functions to get the form view
    public function manual() {
        $classes = className::all(); // Fetch all classes
        return view("admin-subsystem.page-views.student-pages.add-student-pages.addStudentManualy", compact('classes'));
    }
    public function document() { 
        return view("admin-subsystem.page-views.student-pages.add-student-pages.addStudentDocument");
    }
    
    //* function to add students
    public function store(Request $request)
    {
        //* add student by document
        if ($request->hasFile('document')) {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv',  // Ensure the file is an Excel file
            ]);
        
            // Import the students data
            Excel::import(new StudentImport, $request->file('file'));

            return back()->with('success', 'Students imported successfully!');
        }

        //* add student by manually
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'classname' => 'required|string|max:255',
            'classID' => 'required|exists:classNames,classID', // Validate classID
        ]);

        // Create the student
        students::create($request->only('name', 'year', 'classname', 'classID'));

        return back()->with('success', 'Student added successfully!');
    }

    //* show specific student info
    public function show($studentID) {
        $student = students::findOrFail($studentID);
        return view('admin-subsystem.page-views.student-pages.studentView', compact('student'));
    }
     
    //* remove student
    public function destroy($id) {
        
    }

    //* search students
    public function search(Request $request)
    {
        $query = $request->get('q');
        $students = students::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json($students);
    }
}
