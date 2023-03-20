<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\SiteSetting;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {




        Schema::defaultStringLength(191);
        if (env('APP_ENV') == 'production')
        \URL::forceScheme('https');


//        Cache::flush();


$brands=[];
$depts=[];
$cities=[];
$settings=[];
        try{
    $depts=Cache::remember('depts',60*60,function (){
        return
         Department::orderBy("created_at","desc")->get();
      });
      $settings=Cache::remember("settings",360*60,function(){
        return  SiteSetting::all();
    });

    foreach($settings as $setting){

        // config("mysetting.".$setting['key'])->set($setting["value"]);
Config::set("mysetting.".$setting["key"],$setting["value"]);

//    config("mysetting.".$setting['key'])->set($setting["value"]);
}
}catch(Exception $e){

}
            view()->share('depts',$depts);
        //
    }
}
