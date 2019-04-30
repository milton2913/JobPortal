<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $table = "institutes";
    protected $fillable =['name','country_id','is_active'];

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
    public function education(){
        return $this->hasOne('App\Models\Education');
    }
    //select institute
    public function employment(){
        return $this->belongsToMany('App\Models\Employment');
    }
}
