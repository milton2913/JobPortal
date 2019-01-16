<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table="organizations";
    protected $fillable = ['country_id','industry_type_id','organization_type_id','name','address','post_code'];

    public function country(){
        return $this->belongsTo('Models\Country');
    }
    public function industry_type(){
        return $this->belongsTo('Models\IndustryType');
    }
    public function organization_type(){
        return $this->belongsTo('Models\OrganizationType');
    }
}
