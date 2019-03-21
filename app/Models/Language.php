<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table="languages";
    protected $fillable = ['user_id','name','written','listening','spoken','reading'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
