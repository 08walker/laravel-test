<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Manager
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role == 'Manager') {
            return $next($request);
        }
        abort(403);
    }
}
