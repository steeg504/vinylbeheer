<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Sitegroups
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
        if (Session::has('sitegroup')) {
            return $next($request);
        }else{
            if (Auth::check()){
                if (count(Auth::user()->getSitegroups()) == 1) {
                    Session::put('sitegroup', Auth::user()->getSitegroups());
                    return redirect('sitegroups');
                } else {
                    return redirect('sitegroups');
                }
            }else{
                return redirect('login');
            }
        }
    }
}

