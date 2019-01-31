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

}
