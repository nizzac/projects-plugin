<?php

namespace Unspun\Projects\Middleware;

use Backend\Facades\BackendAuth;
use Closure;

class AuthenticatedAdmin
{
    public function handle($request, Closure $next)
    {
        dd(BackendAuth::check());
        if (!BackendAuth::check()) {
            return response()->json('Not allowed', 401);
        }
        
        return $next($request);
    }
}