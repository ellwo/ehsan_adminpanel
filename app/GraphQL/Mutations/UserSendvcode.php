<?php

namespace App\GraphQL\Mutations;

use App\Models\PhoneCode;
use App\Models\User;
use DateTime;
use Exception;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

final class UserSendvcode
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */  public $args;
    public function __invoke($_, array $args)
    {

        $this->args=$args;



        if($this->ensureIsNotRateLimited())
        { try{


        $res=PhoneCode::where('phone','=',auth()->user()->phone)->where('ex_at','>',now())->delete();
        // TODO implement the resolver
        $date=new DateTime('now');
        $date->modify('+59 minutes');

        $user=User::find(auth()->user()->id);
        $user->phone=$args['phone'];
        $user->save();

        $codee=rand(rand(14465,24598550),87952)."";
        $fcodee=substr($codee,0,4);
        $code=PhoneCode::create([
            'phone'=>$args["phone"],
            "code"=>$fcodee,
            "ex_at"=>$date,
            'user_id'=>auth()->user()->id
        ]);

        RateLimiter::tooManyAttempts($this->throttleKey(), 5);
        $attempsCount= RateLimiter::attempts($this->throttleKey());
        RateLimiter::hit($this->throttleKey(),120 * ($attempsCount!=0?$attempsCount:1));
        $seconds = RateLimiter::availableIn($this->throttleKey());
        return ["responInfo"=>[
            'state'=>true,
            'message'=>'تم ارسال الكود بنجاح '.$seconds,],
            "nextcode"=>$attempsCount   ];
    }
    catch(Exception $e){

        $seconds = RateLimiter::availableIn($this->throttleKey());
        return ["responInfo"=>[
            'state'=>false,
            'message'=>$e->getMessage(),
        ],
            "nextcode"=>$seconds
        ];
    }
}else{

    $attempsCount= RateLimiter::attempts($this->throttleKey());
    RateLimiter::hit($this->throttleKey(),120 * ($attempsCount!=0?$attempsCount:1));

    $seconds = RateLimiter::availableIn($this->throttleKey());
    return ["responInfo"=>[
        'state'=>false,
        'message'=>'خطاء عدد المحاولات تجاوزت الحد المطلوب يجب عليك الانتظار لطلب كود جديد',],
        "nextcode"=>$seconds   ];




}


    }
    public function ensureIsNotRateLimited()
    {


        $seconds = RateLimiter::availableIn($this->throttleKey());
        if ($seconds==0) {
            return true;
        }
        else {
            return false;
        }

    }

    public function throttleKey()
    {
        $thkey=$this->args["phone"];
        return Str::lower($thkey).' ';
    }
}
