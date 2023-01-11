<?php

namespace App\Http\Middleware;

use Alert;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'user'){
            return $next($request);
        }

        Alert::error('Maaf', 'Anda bukan user');
        return redirect()->back()->withInput();
    }
}
