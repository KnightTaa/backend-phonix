<?php

// RoleMiddleware
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/'); // or wherever you want to redirect unauthorized users
        }

        return $next($request);
    }
}

