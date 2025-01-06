<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\className;
use App\Imports\ClassnameImport;


class classManagerController extends Controller
{
    public function manual() {
        return view("admin-subsystem.page-views.class-pages.add-class-pages.addClassManualy");
    }
    public function document() { 
        return view("admin-subsystem.page-views.class-pages.add-class-pages.addClassDocument");
    }

    
    public function store(Request $request){
        //* add class by document
        if ($request->hasFile('document')) {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv',  // Ensure the file is an Excel file
            ]);
        
            // Import the students data
            Excel::import(new ClassnameImport, $request->file('file'));

            return back()->with('success', 'Students imported successfully!');
        }
        
        //* add class by manually
        $request->validate([
            'classname' => 'required|string|max:255',
            'year' => 'required|string|max:1',
        ]);

        // Create a new teacher record
        className::create([
            'classname' => $request->classname,
            'year' => $request->year,
        ]);

        return redirect()->route('class-list')->with('success', 'Class added successfully!');
    }

     //* handle class selection
     public function handleClassSelection(Request $request) {
        // Validate the user input
        $request->validate([
            'classname' => 'required',
            'year' => 'required'
        ]);
    
        // Redirect to student list page with selected parameters
        return redirect()->route('student-list', [
            'year' => $request->year,
            'classname' => $request->classname
        ]);
    }

     //* show specific class info
     public function show($classID) {
        $className = className::findOrFail($classID);
        return view('admin-subsystem.page-views.class-pages.classView', compact('className'));
    }

    //* remove class
    public function destroy($id) {
        
    }
}
