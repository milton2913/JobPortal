<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobLevel extends Model
{
    protected $table="job_levels";
    protected $fillable = ['title','slug','is_active'];

    //select job level
    public function employment(){
        return $this->belongsToMany('App\Models\Employment');
    }
}
