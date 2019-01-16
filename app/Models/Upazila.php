<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $table="upazilas";
    protected $fillable = ['name','district_id','name','bn_name'];


    public function district(){
        return $this->belongsTo('Models\Division');
    }
    public function union(){
        return $this->belongsTo('Models\Upazila');
    }
    public function profile(){
        return $this->hasOne('Models\Profile');
    }
}
