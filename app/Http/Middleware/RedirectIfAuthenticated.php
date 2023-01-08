<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::user()) {
            if(Auth::user()->role == 'admin'){
                return redirect('/admin/main');
            }

            return redirect('/dashboard/main');
        }

        return $next($request);
    }
}
