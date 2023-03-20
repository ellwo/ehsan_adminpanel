<?php

namespace App\GraphQL\Queries;

use App\Models\Donor;
use Exception;

final class SearchDonor
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        try{

            $donoer=Donor::where($args['column_name'],
            '=',$args['value'])->first();

            if($donoer!=null)
            {
                return [
                    'responsinfo'=>[
                        'state'=>true,
                        'message'=>'تم العثور عليه',
                        'code'=>200
                    ],
                    'donor'=>$donoer
                ];
            }
            else{
                return [
                    'responsinfo'=>[
                        'state'=>false,
                        'message'=>'لم يتم العثور عليه',
                        'code'=>404
                    ],
                    'donor'=>null
                ];
            }

        }catch(Exception $e){

            return [
                'responsinfo'=>[
                    'state'=>false,
                    'message'=>$e->getMessage(),
                    'code'=>501
                ],
                'donor'=>null
            ];


        }

    }
}
