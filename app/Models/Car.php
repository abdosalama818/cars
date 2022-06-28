<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];


    //car belongs to brand

    public function brand(){
        return $this->belongsTo(Brand::class);
    }



        //car belongs to user

        public function user(){
            return $this->belongsTo(User::class);
        }


}
