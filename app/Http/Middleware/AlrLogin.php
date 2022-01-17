<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlrLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    { //to block the access on changing the url(login & register) when logged in
        if(Session()->has('loginId') && (url('login')==$request->url() || url('register')==$request->url())){
            return back();
        }
        return $next($request);
    }
}
