<?php

namespace App\Http\Middleware;

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
      switch ($guard) {
        case 'manager':
          if (Auth::guard($guard)->check()) {
              return redirect('manager/home');
          }
          break;

        case 'admin':
          if (Auth::guard($guard)->check()) {
              return redirect('admin/home');
          }
          break;

        default:
          if (Auth::guard($guard)->check()) {
              return redirect('activity/published');
          }
          break;
      }

      return $next($request);
    }
}
