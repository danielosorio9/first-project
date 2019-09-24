<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Example of middleware:
        // This code will only show the page when the time is in an odd second
        if (now()->format('s') % 2) {
            // This returns the next middleware
            return $next($request);
        }

        return response('Not Allow!');
    }
}
