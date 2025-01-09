<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch specific columns (name, ic_no, class, year) from the students table
        $students = Student::select('name', 'ic_no', 'class', 'year')->get();

        // Pass the students data to the view
        return view('students.index', compact('students'));
    }
}

