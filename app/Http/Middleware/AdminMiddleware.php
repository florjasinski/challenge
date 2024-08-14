<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (! auth()->check()) {
           abort(403, 'You have to be logged in to access this page');
        }

        return $next($request);
    }
}