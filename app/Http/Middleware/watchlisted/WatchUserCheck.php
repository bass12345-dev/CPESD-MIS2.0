<?php

namespace App\Http\Middleware\watchlisted;

use Closure;
use Illuminate\Http\Request;

class WatchUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (session('user_type') != 'user') {
            return redirect('/watchlisted/admin/dashboard');
        }

        return $next($request);
        
    }
}
