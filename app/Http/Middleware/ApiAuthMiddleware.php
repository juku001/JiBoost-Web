<?php



namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('api_token')) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in.');
        }

        return $next($request);
    }
}
