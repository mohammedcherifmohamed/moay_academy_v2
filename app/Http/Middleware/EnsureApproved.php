<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = null;
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
        } elseif (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        } else {
            // No user logged in at all
            return redirect()->route('loginStudentTeacher')->with('error', 'Please login to access the voice chat.');
        }

        if ($user && $user->status !== 'approved') {
            Auth::guard('teacher')->logout();
            Auth::guard('student')->logout();
            
            // Allow them to see the error message on login page
            return redirect()->route('loginStudentTeacher')
                ->with('error', 'Your account is not approved yet. Please wait for administrator approval.');
        }

        return $next($request);
    }
}
