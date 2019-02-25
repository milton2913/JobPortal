<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvObjective extends Model
{
    protected $table="cv_objectives";
    protected $primaryKey = "id";
    protected $fillable = ['user_id','objective','is_active','title'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
