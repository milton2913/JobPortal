<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table="trainings";
    protected $fillable = ['title','topic','year','institute','duration',"location","country_id","user_id"];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

}
