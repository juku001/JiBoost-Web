<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FirstTimeRedirect
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is intentionally revisiting the welcome page
        if ($request->query('reset_welcome')) {
            return $next($request);
        }

        // Check if the user has visited before
        if (Session::has('visited_before')) {
            return redirect('/login');
        }

        // Mark user as visited
        Session::put('visited_before', true);

        return $next($request);
    }
}
