<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','phone','gender',
        'note','user_id'
    ];


     public function user(){

        return $this->belongsTo(User::class);
     }

     public function materialdonations(){
        return $this->hasMany(MaterialDonation::class);
    }
    public function monetarydonations(){
        return $this->hasMany(MonetaryDonation::class);
    }

}
