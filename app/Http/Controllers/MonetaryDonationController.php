<?php

namespace App\Http\Controllers;

use App\Models\MonetaryDonation;
use Illuminate\Http\Request;

class MonetaryDonationController extends Controller
{
    //


   public function index(Request $request){

    $user_id=$request['user_id']??-1;
    $column_name=$request['column_name']??"";
    return view('admin.monetarydonation.index',compact('user_id','column_name'));
   }


   public function show( $monetaryDonation){

     $monetaryDonation=MonetaryDonation::find($monetaryDonation);

    return view('admin.monetarydonation.show',[
        'mon'=>$monetaryDonation
    ]);

   }
}
