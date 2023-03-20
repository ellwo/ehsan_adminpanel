<?php

namespace App\GraphQL\Mutations;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     *
     */

    public $args=[];
    public function __invoke($_, array $args)
    {
        $this->args=$args;
        // TODO implement the resolver
        $guard =  \Auth::guard('web');



        $userN='username';
        if(strpos($args["user"],"@")!=false){
        $userN='email';
     }


        if($userN=="username")
        $arg=[
            "username"=>$args["user"],
            "password"=>$args["password"]
        ];
        else
            $arg=[
                "email"=>$args["user"],
                "password"=>$args["password"]
            ];



        if($this->ensureIsNotRateLimited()){

            if( ! $guard->attempt($arg)) {
                $errors=[
                    "password"=>"M",
                    "email"=>""
                ];

                $data=[
                    "user"=>null,
                    "errors"=>json_encode($errors),
                    "message"=>"كلمة السر او اسم المستخدم غير صحيح",
                    "state"=>false,
                    "code"=>"ip ".request()->ip()."",
                    "token"=>null];
                RateLimiter::hit($this->throttleKey());


                return $data;
            }
            else{

                $user = $guard->user();


                if(isset($args["logoutfromall"]) && $args["logoutfromall"]==true)
                    $user->tokens()->delete();

                $token=$user->createToken($args["tokenname"]??"newsession")->plainTextToken;



                $data1=[
                    "user"=>$user,
                    "errors"=>null,
                    "message"=>"Login!",
                    "code"=>"202",
                    "state"=>true,
                    "token"=>$token
                ];
                return  $data1;

            }






        }

        else{
            $seconds = RateLimiter::availableIn($this->throttleKey());

            $errors=[
                "password"=>"M",
                "email"=>""
            ];

            $data=[
                "user"=>null,
                "errors"=>json_encode($errors),
                "message"=>"You can try after".$seconds,
                "state"=>false,
                "code"=>"405",
                "token"=>null];
            return $data;

        }





        /**
         * Since we successfully logged in, this can no longer be `null`.
         *
         * @var \App\Models\User $user
         */
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
        $thkey=$this->args["user"];
        return Str::lower($thkey).'|'.request()->ip();
    }
}
