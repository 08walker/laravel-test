<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Revisor
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role == 'Revisor') {
            return $next($request);
        }
        abort(403);
    }
}
