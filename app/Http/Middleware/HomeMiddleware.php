<?php

namespace App\Http\Middleware;

use Closure;

use Session;


class HomeMiddleware
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
        //验证用户是否登录
        if(Session('uid')){
            return $next($request);
        } else {
            return redirect('/home/admin');
        }
    }
}
