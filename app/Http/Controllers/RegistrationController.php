<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));

        // Insert into database
        DB::table('users')->insert([
            'username' => $username,
            'password' => $password,
        ]);

        return redirect('/login')->with('success', 'Registration successful!');
    }
}
