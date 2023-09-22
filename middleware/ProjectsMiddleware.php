<?php

namespace Impelling\Projects\Middleware;

use Closure;
use Impelling\Projects\Models\AccessToken;

class ProjectsMiddleware
{
    public function handle($request, Closure $next)
    {
        $accessToken = AccessToken::with('project')->where('enabled', true)->where('access_token', hash('sha256', $request->bearerToken()))->first();
        
        if (!$accessToken) {
            return response()->json('Not allowed', 401);
        }
        
        if ($request->route('id') !== $accessToken->project->api_id) {
            return response()->json('Project not found', 403);
        }

        return $next($request);       
    }
}