<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MahasiswaCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        dd(Auth::check());
        if (!Auth::check()) {
            // If not authenticated, redirect to login page
            return redirect('/login');
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check role based on the provided parameter
        // if (get_class($user) !== 'App\Models\mahasiswa') {
        //     return redirect('/login')->withErrors(['message' => 'Access denied for mahasiswa.']);
        // }

        return $next($request);
    }
}
