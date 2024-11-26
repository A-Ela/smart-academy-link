<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\teachers;


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
        // Use dd() to debug the request data
        dd($request->all());
        
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
    public function show($id) {
        $teacher = teachers::findOrFail($id);
        return view('admin-subsystem.page-views.teacher-pages.teacherView', compact('teacher'));
    }

    //* remove teacher
    public function destroy($id) {
        
    }
}
