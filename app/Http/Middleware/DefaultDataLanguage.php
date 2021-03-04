<?php

namespace App\Http\Middleware;

use Closure;

class DefaultDataLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (blank(session('admin-formLocal'))) {
            session(['admin-formLocal' => 'ja']);
        }

        //

        if(app()->getLocale() == 'zh-Hant'){
            //app()->setLocale('ja');
        }



        return $next($request);
    }
}
