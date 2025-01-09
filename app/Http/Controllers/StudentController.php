<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch specific columns (name, ic_no, class, year) from the students table
        $students = students::select('name', 'ic_no', 'classname', 'year')->get();

        // Pass the students data to the view
        return view('teacher-subsystem.students.index', compact('students'));
    }
}

