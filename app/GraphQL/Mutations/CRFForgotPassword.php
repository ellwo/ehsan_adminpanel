<?php

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Password;

final class CRFForgotPassword
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
       $state= Password::sendResetLink(
            $args['email']);

           if( $state == Password::RESET_LINK_SENT){
            return
            [

            ];
           }
        return $state;
    }
}
