<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isAdmin = auth()->user()
            ->memberships()
            ->where('role', 'admin')
            ->exists();

        if (!$isAdmin) {
            abort(403);
        }

        return $next($request);
    }
}
