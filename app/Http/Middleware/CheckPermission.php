<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $module, string $action): Response
    {
        $user = $request->user();
        $workspaceId = $request->header('X-Workspace-ID');
        if (!$user || !$workspaceId) {
            return response()->json([
                'message' => 'Unauthorized',
                'data' => null,
                'success' => false,
            ], 401);
        }

        $authorizationService = app(\App\Application\Services\AuthorizationService::class);
        if (!$authorizationService->can($user, (int)$workspaceId, $module, $action)) {
            return response()->json([
                'message' => 'Forbidden',
                'data' => null,
                'success' => false,
            ], 403);
        }

        return $next($request);
    }
}
