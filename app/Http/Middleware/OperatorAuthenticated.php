<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class OperatorAuthenticated
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
            if($user->hasRole('admin'))
            {
                return redirect(route('defaultHome'));
            }
            else if($user->hasRole('operator'))
            {
                return $next($request);
            }
        }
        abort(403);
    }
}
