<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processetoken extends Model
{
    use HasFactory;

    protected $fillable=[
        'processe_id',
        'processe_type',
        'token',
        'expired_at',
        'user_id'
    ];
    protected $casts=[
        'expired_at'=>'datetime'
    ];


    public function processe(){

        return $this->morphTo();
    }



}
