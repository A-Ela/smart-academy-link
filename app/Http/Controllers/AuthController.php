<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Handle user login
     */
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|email',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Query the database for the user
        $user = DB::table('users')->where('email', $username)->first();

        if ($user) {
            // Verify the password
            if (Hash::check($password, $user->password)) {
                // Regenerate the session ID for security
                $request->session()->regenerate();

                // Store user data in the session
                Session::put('role', $user->role);
                Session::put('user_id', $user->id);

                // Redirect to the dashboard
                return redirect('/dashboard');
            } else {
                // Invalid password
                return back()->withErrors(['Invalid username or password.']);
            }
        } else {
            // User not found
            return back()->withErrors(['Invalid username or password.']);
        }
    }
}
