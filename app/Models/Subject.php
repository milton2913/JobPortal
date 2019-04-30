<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table ="subjects";
    protected $fillable = ['title','slug','is_active'];

    public function education()
    {
        return $this->hasOne('App\Models\Education');
    }

    //select subject
    public function employment(){
        return $this->belongsToMany('App\Models\Employment');
    }
}
