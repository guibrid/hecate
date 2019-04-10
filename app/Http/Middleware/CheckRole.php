<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $user = Auth::user();
            if($user->authorizeRoles($roles)){
                return $next($request);
            }
        return redirect('login');

    }
}
