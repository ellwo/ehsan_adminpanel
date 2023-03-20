<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rassed extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id'
    ];





    public function user(){

        return $this->belongsTo(User::class);
    }

    public function actevities(){
        return $this->hasMany(RassedActevity::class);
    }

    public function rassedy(){
     return $this->actevities->sum('amount');
    }
}

