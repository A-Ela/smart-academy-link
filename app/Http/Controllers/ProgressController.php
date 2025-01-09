<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function performance()
    {
        return view('progress.performance');
    }

    public function academic()
    {
        return view('progress.academic');
    }

    public function diniyyah()
    {
        return view('progress.diniyyah');
    }

    public function tarbiah()
    {
        return view('progress.tarbiah');
    }
}
