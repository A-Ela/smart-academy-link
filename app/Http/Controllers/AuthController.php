<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\teachers;
use App\Models\parents;
use App\Models\admins;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('access-subsystem.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Check in teachers table
        $user = teachers::where('email', $username)->first();
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect()->route('teacher-dashboard');
        }

        // Check in parents table
        $user = parents::where('email', $username)->first();
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect()->route('parent-dashboard');
        }

        // Check in admins table
        $user = admins::where('username', $username)->first();
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect()->route('admin-dashboard');
        }

        return back()->withErrors(['Invalid username or password.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function contactSchool(Request $request)
    {
        $request->validate([
            'contact_info' => 'required|string|max:255',
        ]);

        // Handle the contact information (e.g., send an email to the school administration)
        // For simplicity, we'll just return a success message
        return back()->with('success', 'Your contact information has been submitted. The school will contact you soon.');
    }
}
