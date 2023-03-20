<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneCode extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'ex_at',
        'phone',
        'user_id'
    ];

    public function getExAtAttribute($value){

        return $value > now();
    }
}
