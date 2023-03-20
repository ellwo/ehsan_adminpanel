<?php

namespace App\GraphQL\Queries;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class Qgetemail
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $args;
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

        $user=User::where($args["column_name"],"=",$args["user"])->first();

        $this->args=$args;

            if($this->ensureIsNotRateLimited()){

        if($user!=null){






                if(
                    Auth::attempt(["email"=>$user->email,"password"=>$args["password"]],false))
                {

                    if($user->isBanned())
                    {

                        $exper=$user->bans()->orderBy('created_at','desc')->first();
                        $days=now()->diffInDays( $exper->expired_at);

                        if($days<=0){
                        $def=now()->diffInHours($exper->expired_at);
                        $days=$def." ساعة";
                      }
                      else
                      $days=$days."  يوم";
                      $message=" حسابك مقفل لمدة ".$days;
                      $message.=$user->name."  عذرا ";
                      $message.="\n".$exper->comment;
                        return [
                            "email"=>null,
                            "responsinfo"=>
                                   ["state"=>false,
                                     "errors"=>json_encode(["user"=>["هذا المستخدم غير موجود"]]),
                                        "message"=>$message,
                                        "code"=>405]
                        ];
                        //redirect()->route('login')->with('status',$message)->with('error_login',$message)->with('email',$user->email);


                    }


            return [
                "email"=>$user->email,
                "responsinfo"=>
                       ["state"=>true,
                         "errors"=>null,
                            "message"=>"صح موجود",
                            "code"=>200]
            ];







                }

                else{
                    RateLimiter::hit($this->throttleKey());
                    return [
                        "email"=>null,
                        "responsinfo"=>
                               ["state"=>false,
                                 "errors"=>json_encode(["user"=>["هذا المستخدم غير موجود"]]),
                                    "message"=>" هذا المستخدم غير موجود كلمة السر او اسم المستخدم خطاء",
                                    "code"=>404]
                    ];
                }






        }

        else{


            RateLimiter::hit($this->throttleKey());
            return [
                "email"=>null,
                "responsinfo"=>
                       ["state"=>false,
                         "errors"=>json_encode(["user"=>["هذا المستخدم غير موجود"]]),
                            "message"=>"هذا المستخدم غير موجود",
                            "code"=>404]
            ];

        }
    }
    else{




  $seconds = RateLimiter::availableIn($this->throttleKey());
        RateLimiter::hit($this->throttleKey(),$seconds*2);
        $seconds = RateLimiter::availableIn($this->throttleKey());

        return [
                "email"=>null,
                "responsinfo"=>
                       ["state"=>false,
                         "errors"=>json_encode(["user"=>["هذا المستخدم غير موجود"]]),
                            "message"=>"خطاء عدد المحاولات كثيرة يمكنك المحاولة بعد\n".ceil($seconds / 60)." دقيقة ".$seconds." ثانية "
                            ,"code"=>500]
            ];

        }
    }



    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return true;
        }


        else {

             event(new Lockout(request()));
            return false;
        }

    }

    public function throttleKey()
    {
       // $thkey=$this->args["user"];
        return Str::lower($this->args['user']).'|'.request()->ip();
    }
}
