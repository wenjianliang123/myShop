<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        echo "这是登录前置中间件";
//        var_dump(session('user_name'));
//        die();
        echo "<br />";
        if(!$request->session()->exists('user_name')){
            return redirect('/login');
        }
        return $next($request);
    }
}
