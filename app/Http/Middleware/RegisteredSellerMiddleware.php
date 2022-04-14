<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RegisteredSellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role != 'seller') {
            return abort(401);
        }
        return $next($request);
    }
}
