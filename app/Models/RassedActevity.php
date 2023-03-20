<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RassedActevity extends Model
{
    use HasFactory;
    protected $fillable=[
        'paymentinfo_id',
        'rassed_id',
        'amount',
        'code'
    ];


    function paymentinfo(){
        return $this->belongsTo(Paymentinfo::class);
    }

    function rassed(){
        return $this->belongsTo(Rassed::class);
    }



}
