<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table="addresses";
    protected $fillable = ['in_bangladesh','address_type','country_id','division_id','district_id','upazila_id','post_code','others','user_id'];


    public function user(){
        return $this->belongsTo('User');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
    public function division(){
        return $this->belongsTo('App\Models\Division');
    }
    public function district(){
        return $this->belongsTo('App\Models\District');
    }
    public function upazila(){
        return $this->belongsTo('App\Models\Upazila');
    }
}
