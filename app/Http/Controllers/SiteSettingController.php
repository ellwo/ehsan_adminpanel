<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class SiteSettingController extends Controller
{
    //

    public function index(Request $request)
    {
        # code...





        return view("admin.site-setting");
    }


     public function store(Request $request)
    {
        # code...

      //  dd($_POST);
        foreach($_POST as $k=>$v){

            $siteSett=SiteSetting::where("key","=",$k)->first();
            if($siteSett!=null){
            $siteSett->value=$v;
            $siteSett->save();
        }
        else if($k!="_token"){
            SiteSetting::create([
                'key'=>$k,
                'value'=>$v

            ]);
        }
  }

  Cache::forget("settings");

       return redirect()->route("sitesetting");




    }
}
