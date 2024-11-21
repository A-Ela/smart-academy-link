<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admins;
use App\Models\students;
use App\Models\className;
use App\Models\teachers;
use App\Models\parents;


class studentManagerController extends Controller
{
    //* functions to get the form view
    public function manual() {
        return view("addStudentManualy");
    }
    public function document() { 
        return view("addStudentDocument");
    }
    
    //* function to add students
    public function store(Request $request)
    {
        //* add student by document
        if ($request->hasFile('document')) {
            $file = $request->file('document');

            // Process the document (CSV/Excel parsing logic)
            // Example: Use a package like Laravel-Excel
            return response()->json(['message' => 'Document processed and students added!']);
        }

        //* add student by manually
        students::create($request->only('name', 'year','classname'));
        return redirect()->route('student-list')->with('success', 'Student added successfully!');
    }

    //* remove student
    public function destroy($id) {
        
    }
}
