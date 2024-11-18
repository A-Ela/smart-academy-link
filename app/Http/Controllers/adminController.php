<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;
use App\Models\admins;
use Illuminate\Support\Facades\Auth;
use App\Models\className;
use App\Models\teachers;
use App\Models\parents;

class adminController extends Controller
{


    //* function to return the view of main dashboard page of admin
    public function getDashboard() {
        
        $adminID = Auth::id();
        $adminName = admins::find($adminID)->value("name");
        
        return view("adminDashboard",["adminName"=> $adminName]);
    }



    //* function to showcase class list for all years and class names
    public function getClassList() {

        $years = className::select('year')->distinct()->pluck('year');//fetch all years
        $classes = className::all();  // Fetch all classes

        return view('classList', compact('years', 'classes'));
    }



    //* function to fetch all class names and years for the selector to showcase student info
    public function getClassInfo() {
        
        $years = className::select('year')->distinct()->pluck('year'); //fetch all years
        $classes = className::all();  // Fetch all classes

        return view('classInfoSelector', compact('years', 'classes'));
    }
    


    //* function to show student list based on selected year and class
    public function showStudentList(Request $request) { 

        $year = $request->input('year');
        $classname = $request->input('classname');
    
        // Find the classID based on year and class name
        $class = className::where('year', $year)
                          ->where('classname', $classname)
                          ->first();
    
        if ($class) {
            // If class is found, retrieve students in that class
            $students = students::where('classID', $class->classID)->get();
            return view('studentList', compact('students', 'year', 'classname'));
        } else {
            // If no class matches the criteria, return a message
            return redirect()->route('classInfoSelector')->withErrors(['msg' => 'No class found for the selected year and class name.']);
        }
    }


    //* function to return all teachers list alphabetically
    public function showTeacherList() {
        $teacher = teachers::orderBy('teacherName', 'asc')->get();
        return view('teacherList',["teacher"=>$teacher]);

    }

    public function getParentList() {
        $parent = parents::all();

        return view("parentList",["parent"=>$parent]);
    }
}
