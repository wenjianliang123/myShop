<?php

namespace App\Http\Middleware;

use Closure;

class limit_time_edit_goods
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
        echo "这是商品修改前置中间件";

        echo "<br />";
        $time=date("H");
//        dd($time); //20
        if($time<9 || $time>17)
        {
            //9点之前 五点之后拒绝进入
            return redirect('/goods/index');
//            return redirect('/goods/index');
        }
        return $next($request);
    }
}
