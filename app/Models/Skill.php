<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table ="skills";
    protected $fillable = ['title','slug','is_active'];

    public function experience(){
        return $this->belongsToMany('App\Models\Experience');
    }

    public function expertise(){
        return $this->hasMany('App\Models\Expertise');
    }
}
