<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admins;
use App\Models\students;
use App\Models\className;
use App\Models\teachers;
use App\Models\parents;


class teacherManagerController extends Controller
{
    public function store(Request $request)
    {   
        //* add manually
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'password' => 'required|string|min:8',
            'subject' => 'required|string|max:255',
        ]);

        // Create a new teacher record
        teachers::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'subject' => $request->subject,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully!');
    }

    //* remove teacher
    public function destroy($id) {
        
    }
}
