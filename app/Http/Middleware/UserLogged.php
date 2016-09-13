<?php

namespace Theater\Http\Middleware;

use Closure;

class UserLogged
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
        if(auth()->check()){
            if(auth()->user()->role_id == 1)
                return redirect('admin');
            return redirect()->route('choose');
        }
        return $next($request);

    }
}
