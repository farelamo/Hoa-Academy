<?php

namespace App\Http\Middleware;

use Alert;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthRouteMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()){
            return $next($request);
        }else {
            Alert::error('Maaf', 'Anda sudah login');
            if (Auth::user()->role == 'admin'){
                return redirect()->back();
            }else if(Auth::user()->role == 'user'){
                return redirect()->back();
            }
        }
    }
}
