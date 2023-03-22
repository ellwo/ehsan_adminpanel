<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class AllowAdminsOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::check()){
        if (! Gate::allows('users_manage')) {

            $email=auth()->user()->email;
            Auth::logout();
            return redirect()->route('login')->
            withInput(['user'=>$email])->withErrors(
                ['user'=>'لايمكنك الوصول لحسابك مسموح فقط للادمن ']
            );
            return abort(401);
        }
    }
        return $next($request);
    }
}
