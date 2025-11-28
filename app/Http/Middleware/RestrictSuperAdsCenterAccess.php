<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class RestrictSuperAdsCenterAccess
{
    public function handle(Request $request, Closure $next)
    {

        if (!Auth::check()) {
            return redirect('/login');
            // return abort(403, 'Access denied.');
        }

                // return $next($request);

        $user = Auth::user();
// dd($request->route());
        if ($user->role === 'business') {
            // Super Ads allowed routes for business only
            $allowedRoutes = [
                "ads.index",
                "ads.type",
                "ads.create",
                "ads.store",
                "ads.show",
                "ads.edit",
                "ads.update",
                "ads.destroy",
            ];

            // If route not allowed → redirect to ads index
            if (!in_array($request->route()->getName(), $allowedRoutes)) {
                return redirect()->route('ads.index');
            }
        // dd($request->route()->getName());

            // BUSINESS ONLY allowed types
            // $allowedAdTypes = ['clients-form', 'website-visits'];

            // // If route has {type} parameter (ads pages)
            // if ($request->route('type') && !in_array($request->route('type'), $allowedAdTypes)) {
            //     return redirect()->route('ads.index');
            // }

            return $next($request); // business allowed for these only
        }

        // NORMAL USERS
        // They can access everything including ADS Center
        // BUT must NOT access "clients-form" and "website-visits"
        if ($request->route()->getName() === 'ads.type' && in_array($request->route('type'), ['clients-form', 'website-visits'])) {
            return abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
