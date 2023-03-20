<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use Exception;

final class UserActivites
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        try{

        $user=User::find(auth()->user()->id);


     if($args['type']=="monetarydonation"){
        $monetarydonations_acivites=$user->monetarydonations_acivites($args['monetarydonations_page']??1);
        return[
            'responsinfo'=>[
                'state'=>true,
                'message'=>'Ok',
                'errors'=>null,
                'code'=>200
            ],
            'materialdonationsactivites'=>null,
            'monetarydonationsactivites'=>[
                'data'=>$monetarydonations_acivites["data"]??null,
                'total'=>$monetarydonations_acivites["total"]??0,
                'hasmore'=>$monetarydonations_acivites["hasmore"]??false,
            ]

        ];

    }

    else if($args["type"]=="materialdonation"){
        $materialdonations_activites=$user->materialdonations_acivites($args['materialdonations_page']??1);
        return[
            'responsinfo'=>[
                'state'=>true,
                'message'=>'Ok',
                'errors'=>null,
                'code'=>200
            ],
            'materialdonationsactivites'=>[
                'data'=>$materialdonations_activites["data"]??null,
                'total'=>$materialdonations_activites["total"]??0,
                'hasmore'=>$materialdonations_activites["hasmore"]??false,

            ],
            'monetarydonationsactivites'=>null

        ];

    }
    else{
        $monetarydonations_acivites=$user->monetarydonations_acivites($args['monetarydonations_page']??1);
        $materialdonations_activites=$user->materialdonations_acivites($args['materialdonations_page']??1);
        return[
            'responsinfo'=>[
                'state'=>true,
                'message'=>'Ok',
                'errors'=>null,
                'code'=>200
            ],
            'materialdonationsactivites'=>[
                'data'=>$materialdonations_activites["data"]??null,
                'total'=>$materialdonations_activites["total"]??0,
                'hasmore'=>$materialdonations_activites["hasmore"]??false,

            ],
            'monetarydonationsactivites'=>[
                'data'=>$monetarydonations_acivites["data"]??null,
                'total'=>$monetarydonations_acivites["total"]??0,
                'hasmore'=>$monetarydonations_acivites["hasmore"]??false,
            ]

        ];

    }





    }catch(Exception $e){

        return[
            'responsinfo'=>[
                'state'=>false,
                'message'=>$e->getMessage(),
                'errors'=>json_encode(['error'=>['message'=>$e->getMessage()]]),
                'code'=>500
            ],
            'materialdonationsactivites'=>null,
            'monetarydonationsactivites'=>null

        ];
    }




        // TODO implement the resolver
    }
}
