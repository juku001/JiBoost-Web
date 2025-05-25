<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $array = (array) session(env('USER_INFO_KEY'));

        if ($array['user_type'] == 'superadmin') {
            return $next($request);
        } else {
            return redirect()->route('welcome');
        }
    }
}
