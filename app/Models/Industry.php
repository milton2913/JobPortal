<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $table="industries";
    protected $fillable = ['title','slug','is_active','industry_type_id'];

    public function industry_type(){
        return $this->belongsTo('App\Models\IndustryType');
    }

    public function employer(){
        return $this->belongsToMany('App\Models\Employer');
    }
}
