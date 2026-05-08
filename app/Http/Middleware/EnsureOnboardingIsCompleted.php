<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureOnboardingIsCompleted
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user && !$user->onboarding_completed) {

            if (!$request->routeIs('register-2', 'join-orchestra', 'logout')) {
                return redirect()->route('register-2');
            }
        }
        return $next($request);
    }
}
