<?php

namespace App\GraphQL\Mutations;

use App\Models\PhoneCode;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

final class VerifyPhone
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

     public $args;
    public function __invoke($_, array $args)
    {
        $this->args=$args;
        // TODO implement the resolver
        $user=User::find(auth()->user()->id);
         $res=PhoneCode::where('code','=',$args['code'])->where('phone','=',$user->phone)
         ->where('ex_at','>',"now()")->first();


         if($res!=null){
            $user->phone_verified_at=Date::now();
            $user->save();
            $res->ex_at=Date::now();
            $res->save();

            return ["responInfo"=>[
                'state'=>true,
                'message'=>'تم التأكيد'],
                "nextcode"=>""
            ];
         }
         else{
            return [
                "responInfo"=>[
                'state'=>false,
                'message'=>'خطاء في الكود'
                //.$user->phone."  ".$args["code"]." ".$res->ex_at
            ]];
         }
    }


    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return true;
        }


        else {

            event(new Lockout(request()));

            $seconds = RateLimiter::availableIn($this->throttleKey());
            return false;
        }

    }

    public function throttleKey()
    {
        $thkey=$this->args["code"];
        return Str::lower($thkey);
    }
}
