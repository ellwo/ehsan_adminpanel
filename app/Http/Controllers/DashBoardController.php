<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\MaterialDonation;
use App\Models\MonetaryDonation;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{


  public function index(){





        $monetarydonations=MonetaryDonation::all();
        $monetarydonation_ye=$monetarydonations->where('type','=',0)->sum('amount');

        $monetarydonation_ks=$monetarydonations->where('type','=',1)->Sum('amount');

        $monetarydonation_us=$monetarydonations->where('type','=',2)->Sum('amount');
        $donors_count=Donor::count();
        $materialdons_count=MaterialDonation::count();


        return view('dashboard',[
            'monetarydonation_ye'=>$monetarydonation_ye,
            'monetarydonation_ks'=>$monetarydonation_ks,
            'monetarydonation_us'=>$monetarydonation_us,
        'donor_count'=>$donors_count,
        'materialdons_count'=>$materialdons_count

        ]);
    }
}
