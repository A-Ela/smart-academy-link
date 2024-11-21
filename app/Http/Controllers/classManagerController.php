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

    //* add class by manually
    public function addClassManually() {
     
    }

    //* add class by document
    public function addClassDoc() {
        
    }

    //* remove class
    public function destroy($id) {
        
    }
}
