<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admins;
use App\Models\students;
use App\Models\className;
use App\Models\teachers;
use App\Models\parents;


class classManagerController extends Controller
{
    public function manual() {
        return view("admin-subsystem.page-views.class-pages.add-class-pages.addClassManualy");
    }
    public function document() { 
        return view("admin-subsystem.page-views.class-pages.add-class-pages.addClassDocument");
    }

    
    public function store(){
        //* add class by manually

        //* add class by document
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
