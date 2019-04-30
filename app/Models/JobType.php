<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $fillable=['title','is_active'];
    //select job type to employment
    public function employment(){
        return $this->belongsToMany('App\Models\Employment');
    }
}
