<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Apilogin
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
        //$user_id = $user->id;
        $user_id = explode('$', decrypt( explode(' ', $request->header('Authorization'))[1]))[1];
        $user = Auth::loginUsingId($user_id);

        
        return $next($request);
    }
}
