<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table="districts";
    protected $fillable = ['name','division_id','bn_name','lat','lon','website'];
    public function division(){
        return $this->belongsTo('Models\Division');
    }
    public function upazila(){
        return $this->hasMany('Models\Upazila');
    }
    public function profile(){
        return $this->hasOne('Models\Profile');
    }
    public function address(){
        return $this->hasMany('Models\Address');
    }
}
