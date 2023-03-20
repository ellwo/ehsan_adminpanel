<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','note','type',
        'img'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
        # code...
    }

}
