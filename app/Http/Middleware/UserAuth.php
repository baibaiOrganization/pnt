<?php

namespace Theater\Http\Middleware;

use Closure;

class UserAuth
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
        $prefix = $request->route()->getPrefix();
        $userRoute = str_contains($prefix, 'premio');

        if(auth()->check()){
            if((auth()->user()->role_id == 1 && !$userRoute) || (auth()->user()->role_id == 3 && !$userRoute) || (auth()->user()->role_id == 2 && $userRoute))
                return $next($request);
        }
        return redirect('/premios');
    }
}
