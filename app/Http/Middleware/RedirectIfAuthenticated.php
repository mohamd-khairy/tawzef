<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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

        if (Auth::check()) {
            if (Auth::user()->group && in_array(Auth::user()->group->slug, ['offices','customers'])) {
                return redirect()->route('front.home');
            }else{
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
