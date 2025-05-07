<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class GuestApiMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('api_token')) {
            if (session(env('USER_INFO_KEY'))['user_type'] == 'superadmin') {
                return redirect()->route('dashboard.admin.home'); // Redirect to dashboard if logged in
            } else {
                return redirect()->route('dashboard.home');
            }
        }

        return $next($request);
    }
}
