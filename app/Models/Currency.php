<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table="currencies";
    protected $fillable = ['title','currency_code','currency_symbol','country_id'];


    public function country(){
        return $this->belongsTo('Models\Country');
    }
}
