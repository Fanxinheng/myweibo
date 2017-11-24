<?php

namespace App\Http\Middleware;

use Closure;
use session;

class AdminMiddleware
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
        if(session('pid')){
            return $next($request);
        } else {
            return redirect('/admin');
        }
    }
}
