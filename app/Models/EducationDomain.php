<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationDomain extends Model
{
    protected $table="education_domain";
    protected $fillable = ['name','country_id'];


    public function country(){
        return $this->belongsTo('Models\Country');
    }
}
