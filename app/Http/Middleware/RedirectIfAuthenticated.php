<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Request;

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
        if($request->is(backendPath('administrator') . '*') && Auth::guard('administrator')->check()) {
            return redirect(langRoute('administrator.home'));
        }
        if($request->is(backendPath('admin') . '*') && Auth::guard('admin')->check()) {
            return redirect(langRoute('admin.home'));
        }

        return $next($request);
    }
}
