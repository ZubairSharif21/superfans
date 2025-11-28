<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class access_allow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $current_date = date('m-d');
        $current_date = strtotime($current_date);
        $last_date = '12-5';
        $last_date = strtotime($last_date);

        $current_month = date('m');
        $current_day = date('d');
        $current_day = (int)$current_day;

        //dd($current_day);
        // if ($current_date < $last_date )
        if ($current_day <= 5 || $current_day > 26)
        {
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
