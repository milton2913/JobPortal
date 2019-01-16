<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table="countries";
    protected $fillable = ['num_code','code_2','code_3','name','nationality'];


    public function organization(){
        return $this->hasMany('Models\Organization');
    }
    public function division(){
        return $this->hasMany('Models\Division');
    }
    public function district(){
        return $this->hasMany('Models\District');
    }
    public function city(){
        return $this->hasMany('Models\City');
    }
    public function education_domain(){
        return $this->hasMany('Models\EducationDomain');
    }
    public function currency(){
        return $this->hasOne('Models\Currency');
    }
    public function country_language(){
        return $this->hasOne('Models\CountryLanguage');
    }
    public function profile(){
        return $this->hasOne('Models\Profile');
    }
    public function education_institute(){
        return $this->hasMany('App\Models\Institute');
    }
}
