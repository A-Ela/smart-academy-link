<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($user) {
            if ($role === 'admin' && $user instanceof \App\Models\admins) {
                return $next($request);
            } elseif ($role === 'teacher' && $user instanceof \App\Models\teachers) {
                return $next($request);
            } elseif ($role === 'parent' && $user instanceof \App\Models\parents) {
                return $next($request);
            }
        }

        return redirect('/login')->withErrors(['You do not have access to this section.']);
    }
}
