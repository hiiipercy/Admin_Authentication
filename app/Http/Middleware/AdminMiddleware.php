<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
        public function handle(Request $request, Closure $next): Response
    {   
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (Auth::check() && $user && $user->isAdmin == 1) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'You do not have admin access.');  
    }

}
