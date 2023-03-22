<?php

namespace App\GraphQL\Mutations;

use App\Events\NewMonetaryDonation;
use App\Models\Donor;
use App\Models\MonetaryDonation;
use Exception;

final class CreateNewMonetaryDonationsM
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
            'amount'=>'required',
            'type'=>'required',
            //'phone'=>'required','min:9','max:9','unique:donors,phone'
        ]);

        if($validator->fails()){

            //$donor=Donor::where('phone','=',$args['phone'])->first();
            return[
               'responsinfo'=>[ 'state'=>false,
                'message'=>'هناك خطاء من المدخلات',
                'errors'=>json_encode($validator->errors()),
                'code'=>400],
                'monetarydonation'=>null
            ];
        }

        try{







            $donor=Donor::updateOrCreate([
                'phone'=>$args["donor"]["phone"],
            ],
                [
                    'name'=>$args["donor"]["name"],
                    'gender'=>$args["donor"]["gender"]
                ]
                );
               $monetary_donation= MonetaryDonation::create(
                    [
                        'amount'=>$args['amount'],
                        'note'=>$args['note']??"",
                        'donor_id'=>$donor->id,
                        'type'=>$args['type']??0,
                        'user_id'=>auth()->user()->id
                    ]
                    );
                    event(new NewMonetaryDonation($monetary_donation));

                    return[
                        'responsinfo'=>[
                         'state'=>true,
                         'message'=>'تم الحفظ بنجاح',
                         'errors'=>null,
                         'code'=>200],
                         'monetarydonation'=>$monetary_donation
                     ];



        }catch(Exception $e){

            return[
                'responsinfo'=>[ 'state'=>false,
                 'message'=>'هنا خطاء في السرفر',
                 'errors'=>json_encode(["error"=>$e->getMessage()]),
                 'code'=>500],
                 'monetarydonation'=>null
             ];

        }
    }
}
