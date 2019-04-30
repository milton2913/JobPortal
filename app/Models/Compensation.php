<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compensation extends Model
{
    protected $fillable=['title','is_active'];
    //select compensation
    public function employment(){
        return $this->belongsToMany('App\Models\Employment');
    }
}
