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
            $role = auth()->user()->role_id;
            if(($role == 1 && $userRoute) || ($role == 3 && $userRoute) || ($role == 2 && !$userRoute)){
                return $role == 2 ? redirect('premios') : redirect('admin');
            }

            return $next($request);
        }
        return redirect('/');
    }
}
