<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustryType extends Model
{

    protected $table="industry_types";
    protected $fillable = ['title','slug','is_active'];

    public function industry(){
        return $this->hasMany('App\Models\Industry');
    }

}
