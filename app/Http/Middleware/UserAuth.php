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
            if((in_array($role, [1,3,4,5]) && $userRoute) || ($role == 2 && !$userRoute)){
                return $role == 2 ? redirect('premios') : redirect('admin');
            }

            return $next($request);
        }
        return redirect('/');
    }
}
