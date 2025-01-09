<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function performance()
    {
        return view('teacher-subsystem.progress.performance');
    }

    public function academic()
    {
        return view('teacher-subsystem.progress.academic');
    }

    public function diniyyah()
    {
        return view('teacher-subsystem.progress.diniyyah');
    }

    public function tarbiah()
    {
        return view('teacher-subsystem.progress.tarbiah');
    }
}
