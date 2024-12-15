<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\students;
use App\Imports\StudentImport;


class studentManagerController extends Controller
{
    //* functions to get the form view
    public function manual() {
        return view("admin-subsystem.page-views.student-pages.add-student-pages.addStudentManualy");
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
        students::create($request->only('name', 'year','classname'));
        return redirect()->route('student-list')->with('success', 'Student added successfully!');
    }

    //* show specific student info
    public function show($studentID) {
        $student = students::findOrFail($studentID);
        return view('admin-subsystem.page-views.student-pages.studentView', compact('student'));
    }

    //* remove student
    public function destroy($id) {
        
    }
}
