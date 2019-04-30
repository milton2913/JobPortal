<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table="experiences";

    protected $fillable = ['company_name','company_business','designation','department','is_current',"start_date","end_date",'location','responsibility',"user_id"];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function skill(){
        return $this->belongsToMany('App\Models\Skill');
    }

}
