<?php

namespace App\Http\Middleware;

use Closure;

class UserPages
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
        echo "check user";
        if($request->role != 'Admin')
        {   
            return redirect('/');
        }
        return $next($request);
    }
}
