<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertStatus extends Model
{
    protected $table="expert_statuses";

    protected $fillable = ['title','slug'];

    public function skill(){
        return $this->belongsToMany('App\Models\Skill');
    }
}
