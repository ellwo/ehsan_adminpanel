<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable=[
        'name',
        'note',
        'img',
        'imgs',
        'discrip',
        'price',
        'required_ep',
        'user_id',
        'department_id'
    ];

    protected $casts =[
        'note'=>'array',
        'imgs'=>'array',
    ];


   public function countoforders(){
    return 0;
   }
    public function category()
    {
        return $this->belongsTo(Category::class);        # code...
    }
public function department()
{
    return $this->belongsTo(Department::class);
    # code...
}

 public function hasOffer(){
    return $this->hasMany(Offer::class)->where('to_date','>',now())->first();
 }

 public function offers(){
    return $this->hasMany(Offer::class)->where('to_date','>',now());
 }


    public function notes(){




        if(count($this->note)==0 || $this->note==null)
        return null;
        return json_encode($this->note);



        $data=[];


        foreach ($this->note as $k=>$v){

            $data[]=[
                "__typename"=>"JsonType",
                "k"=>$k,
                "v"=>$v
            ];
        }
        // $dta["data"]=$data;
        return $data;

    }
}
