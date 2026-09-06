<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    
use Symfony\Component\HttpFoundation\Response;

class RedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {    /** @var \App\Models\User $user */
        $user = Auth::user();
        if (Auth::guard($guard)->check && $user && $user->isAdmin == 1) {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
