<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table="currencies";
    protected $fillable = ['title','currency_symbol','country_id','is_active'];


    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
}
