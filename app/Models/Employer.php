<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table='employers';
    protected $fillable = ['company_name','company_name_bn','country_id','division_id','district_id','upazila_id','address','address_bn','contact_phone','contact_email','industry_type_id','description','trade_license_no','rl_no','website_url','contact_person_name','contact_person_designation','contact_person_mobile','contact_person_email','is_active','user_id','company_logo'];


    public function industry(){
        return $this->belongsToMany('App\Models\Industry');
    }

    public function employerContact(){
        return $this->hasMany('App\Models\EmployerContact');
    }
}
