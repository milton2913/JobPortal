<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $table="expertises";
    protected $fillable = ['user_id','skill_id','expert_status_id'];

    public function skill(){
        return $this->belongsTo('App\Models\Skill');
    }
    public function expertStatus(){
        return $this->belongsTo('App\Models\ExpertStatus');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
