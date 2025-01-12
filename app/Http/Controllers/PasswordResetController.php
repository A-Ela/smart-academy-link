<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasswordResetController extends Controller
{
    public function reset(Request $request)
    {
        $email = $request->input('email');
        $token = Str::random(60);


        // Insert token into password_resets table
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now(),
        ]);

        // Send reset link (mocked here)
        return redirect('/login')->with('success', 'Password reset link sent!');
    }
}
