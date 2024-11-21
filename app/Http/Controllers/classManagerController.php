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

    //* add class by manually

    //* add class by document
    public function store(){

    }

    //* remove class
    public function destroy($id) {
        
    }
}
