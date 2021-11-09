<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param $role
     * @param null $permission
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role, $permission = null)
    {
        if(!Auth::check() || !auth()->user()->hasRole($role)) {
            if($role === 'super-admin') {
                return redirect(route('admin.loginPage'));
            } else {
                abort(404);
            }

        }
        if($permission !== null && !auth()->user()->can($permission)) {
            abort(404);
        }
        return $next($request);
    }
}
