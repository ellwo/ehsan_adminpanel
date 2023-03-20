<?php

namespace App\GraphQL\Mutations;

use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshTokenRepository;

final class MyLogout
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        try{
            /** @var \App\Models\User|null $user */
            $user = Auth::user();


            $refres=app(RefreshTokenRepository::class);
                $refres->revokeRefreshTokensByAccessTokenId( Auth::guard('api')->user()->token()->id);

                Auth::guard('api')->user()->token()->revoke();


            //Auth::logout();

            return [
                "state"=>true,
                "message"=>"تم تسجيل الخروج بنجاح",
                "errors"=>null
            ];
        }catch(Exception $e){
            return [
                "state"=>false,
                "message"=>$e->getMessage(),
                "errors"=>$e->getMessage()
            ];
            }
    }
}
