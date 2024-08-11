<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has the 'ad' role
        if (\Auth::user()->user_type !== 'ad') {
            return abort(403, 'Unauthorized.');
        }

        // Redirect or abort access if user does not have the role
        
        return $next($request);
    }
}
