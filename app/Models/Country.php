<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table="countries";
    protected $fillable = ['num_code','code_2','code_3','name','nationality'];


    public function organization(){
        return $this->hasMany('App\Models\Organization');
    }
    public function division(){
        return $this->hasMany('App\Models\Division');
    }
    public function district(){
        return $this->hasMany('App\Models\District');
    }
    public function city(){
        return $this->hasMany('App\Models\City');
    }
    public function education_domain(){
        return $this->hasMany('App\Models\EducationDomain');
    }
    public function currency(){
        return $this->hasOne('App\Models\Currency');
    }
    public function country_language(){
        return $this->hasOne('App\Models\CountryLanguage');
    }
    public function profile(){
        return $this->hasOne('App\Models\Profile');
    }
    public function education_institute(){
        return $this->hasMany('App\Models\Institute');
    }
    public function address(){
        return $this->hasMany('App\Models\Address');
    }
    public function training(){
        return $this->hasMany('App\Models\Training');
    }
}
