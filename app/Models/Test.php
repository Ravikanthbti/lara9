<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
//accessor
    public function getNameAttribute($value){
        return ucfirst($value);
    }
    //mutator

    public function setAddressAttribute($val){
        return $this->attributes['address']=$val.'  India';
    }
}
