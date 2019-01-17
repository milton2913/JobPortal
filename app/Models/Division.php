<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table ="divisions";
    protected $fillable =['name','bn_name','country_id'];
    public function country(){
        return $this->hasMany('Models\Country');
    }
    public function district(){
        return $this->hasMany('Models\District');
    }
    public function address(){
        return $this->hasMany('Models\Address');
    }
}
