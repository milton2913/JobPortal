<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    protected $table="unions";
    protected $fillable = ['upazila_id','lat','lon','name','bn_name'];


    public function upazila(){
        return $this->belongsTo('Models\Upazila');
    }
    public function profile(){
        return $this->hasOne('Models\Profile');
    }
}
