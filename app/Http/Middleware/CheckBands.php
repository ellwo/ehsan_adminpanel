<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBands
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

        if(auth()->user()!=null){
            $user=auth()->user();
            if($user->isBanned())
            {

                $exper=$user->bans()->orderBy('created_at','desc')->pluck('expired_at')->first();
                $days=now()->diffInDays( $exper);

                if($days<=0){
                $def=now()->diffInHours($exper);
                $days=$def." ساعة";
              }
              else
              $days=$days."  يوم";
              $message=" حسابك مقفل لمدة ".$days;
              $message.=$user->name."  عذرا ";

                auth()->logout();
                session()->flash('status',$message);



                return [
                    "state"=>false,
                    "errors"=>json_encode(["errors"=>["user"=>["message"=>$message]
                    ]]),

                ];

                return redirect()->route('login')->with('status',$message)->with('error_login',$message)->with('email',$user->email);


            }



        }

        return $next($request);
    }
}
