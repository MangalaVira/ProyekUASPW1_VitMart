<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LevelMiddleware
{
    public function handle($request, Closure $next, $level)
    {
        if (!Auth::check() || Auth::User()->level !== $level) {
            return redirect('/');
        }

        return $next($request);
    }
}
