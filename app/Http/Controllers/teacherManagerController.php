<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\teachers;
use App\Imports\TeachersImport;

class teacherManagerController extends Controller
{
    public function manual() {
        return view("admin-subsystem.page-views.teacher-pages.add-teacher-pages.addTeacherManualy");
    }
    public function document() { 
        return view("admin-subsystem.page-views.teacher-pages.add-teacher-pages.addTeacherDocument");
    }
    
    public function store(Request $request)
    {   
        //* add teacher by document
        if ($request->hasFile('document')) {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv',  // Ensure the file is an Excel file
            ]);
        
            // Import the teachers data
            Excel::import(new TeachersImport, $request->file('file'));
        
            return back()->with('success', 'Teachers imported successfully!');
        }
        
        //* add manually
        // Validate the incoming data
        $request->validate([
            'teacherName' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'password' => 'required|string|min:8',
        ]);

        // Create a new teacher record
        teachers::create([
            'teacherName' => $request->teacherName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('teacher-list')->with('success', 'Teacher added successfully!');
    }
    
    //* view specific teacher info
    public function show($teacherID) {
        $teacher = teachers::findOrFail($teacherID);
        return view('admin-subsystem.page-views.teacher-pages.teacherView', compact('teacher'));
    }

    //* remove teacher
    public function destroy($id) {
        
    }
}
