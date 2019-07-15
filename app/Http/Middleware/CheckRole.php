<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        if (auth()->check()) {
            $user = auth()->user();
            if (!in_array($user->role_id, $roles))
                return redirect('/');
        }

        return $next($request);
    }
}
