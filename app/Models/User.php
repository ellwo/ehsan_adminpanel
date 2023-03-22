<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements BannableContract
{
    use HasApiTokens, HasFactory,HasRoles, Notifiable, Bannable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone',
        'gendar',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getEmailVerifiedAtAttribute($value){

        if($value==null)
        return false;
        else
        return true;
    }
    public function getPhoneVerifiedAtAttribute($value){

        if($value==null)
        return false;
        else
        return true;
    }




    public function monetarydonations(){
        return $this->hasMany(MonetaryDonation::class);
    }

    public function materialdonations(){
        return $this->hasMany(MaterialDonation::class);
        //->orderBy('created_at','desc');
    }


    public function monetarydonations_acivites($page=1){
        $_GET["page"]=$page;
        \request()->request->set("page",$page);
        $total=0;
        $hasmore=false;
        $acivites=$this->monetarydonations()->orderBy('created_at','desc')->paginate(20);
        $total=$acivites->total();
        $hasmore=$acivites->hasMorePages()??false;

         $monaterialdonationsactivites=[
            'total'=>$total,
            'hasmore'=>$hasmore,
            'data'=>$acivites
         ];



         return $monaterialdonationsactivites;


    }
    public function materialdonations_acivites($page=1){
        $_GET["page"]=$page;
        \request()->request->set("page",$page);
         $total=0;
         $hasmore=false;

         $acivites=$this->materialdonations()->orderBy('created_at','desc')->paginate(20);


        $total=$acivites->total();
        $hasmore=$acivites->hasMorePages();

         $materialdonationsactivites=[
            'total'=>$total,
            'hasmore'=>$hasmore,
            'data'=>$acivites
         ];
         return $materialdonationsactivites;

    }


    function sum_ye(){
        return $this->monetarydonations()->where("type","=",0)->where("state","=",0)->sum('amount');

    }
    function sum_us(){
        return $this->monetarydonations()->where("type","=",2)->where("state","=",0)->sum('amount');

    }
    function sum_ksa(){
        return $this->monetarydonations()->where("type","=",1)->where("state","=",0)->sum('amount');

    }

    function f_token(){
        return $this->hasOne(FirebaseToken::class);
    }
}
