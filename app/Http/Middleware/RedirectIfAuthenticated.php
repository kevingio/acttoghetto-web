<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            switch (auth()->user()->role_id) {
                case 3:
                    return redirect('/home');
                    break;

                default:
                    return redirect('/admin/transaction');
                    break;
            }
        }

        return $next($request);
    }
}
