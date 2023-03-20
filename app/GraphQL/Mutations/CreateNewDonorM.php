<?php

namespace App\GraphQL\Mutations;

use App\Models\Donor;
use Exception;

use Illuminate\Support\Facades\Validator;

final class CreateNewDonorM
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $validator =Validator::make($args
        , [
            'name'=>'required',
            'phone'=>['required','min:9','max:9','unique:donors,phone'],
        ]);




        if($validator->fails()){
            $donor=Donor::where('phone','=',$args['phone'])->first();

            return[
                'responsinfo'=>[ 'state'=>false,
                 'message'=>'هناك خطاء في رقم الهاتف',
                 'errors'=>json_encode($validator->errors()),
                 'code'=>400],
                 'donor'=>$donor!=null?$donor:null

             ];
        }


        try{


           $donor= Donor::create(
                [
                    'name'=>$args['name'],
                    'phone'=>$args['phone'],
                    'note'=>$args['note']??"",
                    'gender'=>$args['gender']??0,
                    'user_id'=>auth()->user()->id
                ]
                );
                return[
                    'responsinfo'=>[
                     'state'=>true,
                     'message'=>'تم الحفظ بنجاح',
                     'errors'=>null,
                     'code'=>200],
                     'donor'=>$donor!=null?$donor:null
                 ];



    }catch(Exception $e){

        return[
            'responsinfo'=>[ 'state'=>false,
             'message'=>'هناك خطاء في السرفر',
             'errors'=>json_encode(["error"=>$e->getMessage()]),
             'code'=>500],
             'donor'=>null
         ];

    }

        // TODO implement the resolver
    }
}
