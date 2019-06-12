<?php

namespace App\Http\Middleware;

use Closure;

class stu
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
        echo "before";
        $response = $next($request);
        echo "after";
        return $response;
    }
}
