<?php

namespace App\Http\Controllers;

use App\Models\MaterialDonation;
use Illuminate\Http\Request;

class MaterialDonationController extends Controller
{
    //

   public function index(Request $request){


    $user_id=$request["user_id"]??-1;
    $column_name=$request["colmun_name"]??"";

    return view('admin.materialdonation.index',[
        'user_id'=>$user_id,'colmun_name'=>$column_name
    ]);
   }


   public function show( $monetaryDonation){

     $monetaryDonation=MaterialDonation::find($monetaryDonation);

    return view('admin.materialdonation.show',[
        'mon'=>$monetaryDonation
    ]);

   }
}
