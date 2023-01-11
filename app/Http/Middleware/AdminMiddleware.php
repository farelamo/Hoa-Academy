<?php

namespace App\Http\Middleware;

use Alert;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'admin'){
            return $next($request);
        }

        Alert::error('Maaf', 'Anda bukan admin');
        return redirect()->back()->withInput();
    }
}
