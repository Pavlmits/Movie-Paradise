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
        if($request->user() === null or $request->user()->roles() == 'User')
        {
            return redirect('/movies/shows');
        }
    
       
        return $next($request);
    }
}
