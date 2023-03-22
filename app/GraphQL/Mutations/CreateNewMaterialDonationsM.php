<?php

namespace App\GraphQL\Mutations;

use App\Models\Donor;
use App\Models\MaterialDonation;
use Exception;

final class CreateNewMaterialDonationsM
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

        $validator = \Illuminate\Support\Facades\Validator::make($args
        , [
            'name'=>'required',
            //'phone'=>'required','min:9','max:9','unique:donors,phone'
        ]);




        if($validator->fails()){

            //$donor=Donor::where('phone','=',$args['phone'])->first();
            return[
               'responsinfo'=>[ 'state'=>false,
                'message'=>'هناك خطاء من المدخلات',
                'errors'=>json_encode($validator->errors()),
                'code'=>400],
                'materialdonation'=>null
            ];
        }

        try{






            $donor=Donor::
            updateOrCreate([
                'phone'=>$args["donor"]["phone"],
            ],
                [
                    'name'=>$args["donor"]["name"],
                    'gender'=>$args["donor"]["gender"]
                ]
                );

               $materialdonation= MaterialDonation::create(
                    [
                        'name'=>$args['name'],
                        'note'=>$args['note']??"",
                        'donor'=>$donor,
                        'user_id'=>auth()->user()->id
                    ]
                    );
                  //  event(new NewMonetaryDonation($monetary_donation));

                    return[
                        'responsinfo'=>[
                         'state'=>true,
                         'message'=>'تم الحفظ بنجاح',
                         'errors'=>null,
                         'code'=>200],
                         'materialdonation'=>$materialdonation
                     ];



        }catch(Exception $e){

            return[
                'responsinfo'=>[ 'state'=>false,
                 'message'=>'هنا خطاء في السرفر',
                 'errors'=>json_encode(["error"=>$e->getMessage()]),
                 'code'=>500],
                 'materialdonation'=>null
             ];

        }
    }
}
