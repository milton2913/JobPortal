<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryLanguage extends Model
{
    protected $table="country_languages";
    protected $fillable = ['title','is_official','country_id','percentage'];


    public function country(){
        return $this->belongsTo('Models\Country');
    }
}
