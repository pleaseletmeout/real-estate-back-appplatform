<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            /** @var User $user */
            $user = Auth::User();
            if($user->hasRole('operator'))
            {
                return redirect(route('defaultHome'));
            }
            else if($user->hasRole('admin'))
            {
                return $next($request);
            }
        }
        abort(403);
    }
}
