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
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role; 
        
            switch ($role) {
              case 'administrator':
                 return '/direktur/dashboard';
                 break;
              case 'operator':
                 return '/operator/dashboard';
                 break;
                 case 'manajer':
                  return '/manajer/dashboard';
                  break;
        
              default:
                  
                  return '/login';
                 break;
            }
          }
          return $next($request);

        return $next($request);
    }
}
