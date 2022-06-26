<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    //brand ahs many cars

    public function cars(){
        return $this->hasMany(Car::class);
    }
}
