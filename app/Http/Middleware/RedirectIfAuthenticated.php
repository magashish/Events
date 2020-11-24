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
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        // return $next($request);
        // switch ($guard) {
        //     case 'admin':
        //         if (Auth::guard($guard)->check()) {
        //             return redirect()->route('admin.dashboard');
        //         }
        //     break;

        //     default:
        //         if (Auth::guard($guard)->check()) {
        //             return redirect()->intended('/');
        //         }
        //     break;
        // }

        // return $next($request);
        // dd($guard);
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            // dd('in');
            return redirect()->route('admin.dashboard');
        }

        if ($guard == "judge" && Auth::guard($guard)->check()) {
            // dd('in');
            return redirect()->route('judge.dashboard');
        }


        if (Auth::guard($guard)->check()) {
            // dd('in');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
