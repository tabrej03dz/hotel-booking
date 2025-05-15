<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in and has the role 'user'
        if (auth()->check() && auth()->user()->hasRole('Super Admin|Admin|Editor')) {
            // Redirect to some other route (e.g., user homepage)
            return $next($request);

        }
        return redirect('/');

        // Otherwise, allow the request to continue
    }
}
