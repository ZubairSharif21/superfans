<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotBusiness
{
    public function handle(Request $request, Closure $next)
    {
        // User must be logged in and not business role
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role === 'business') {
            return abort(403, 'Access denied');
            // or redirect('/somewhere')
        }

        return $next($request);
    }
}
