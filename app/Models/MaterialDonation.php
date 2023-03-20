<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialDonation extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'note',
        'donor_id',
        'user_id'
    ,
        'resave_by'
    ];



    public function donor(){
        return $this->belongsTo(Donor::class);
    }
    public function resave_by_user(){
        return $this->belongsTo(User::class,'resave_by','id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
