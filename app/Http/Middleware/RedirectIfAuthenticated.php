<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        //$guards = empty($guards) ? [null] : $guards;

        //foreach ($guards as $guard) {
        //    if (Auth::guard($guard)->check()) {
        //        return redirect(RouteServiceProvider::HOME);
        //    }
        //}
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                /** @var User $user */
                $user = Auth::guard($guard);

                // to admin dashboard
                if($user->hasRole('admin')) {
                    return redirect(route('defaultHome'));
                }

                // to user dashboard
                else if($user->hasRole('operator')) {
                    return redirect(route('defaultHome'));
                }
            }
        }

        return $next($request);
        
    }
}
