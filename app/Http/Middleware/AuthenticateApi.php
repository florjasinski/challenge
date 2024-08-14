<?php
// app/Http/Middleware/AuthenticateApi.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateApi
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (!Auth::guard('api')->check()) {
            return response()->json(['message' => 'Unauthorized. Please log in.'], 401);
        }

        return $next($request);
    }
}
