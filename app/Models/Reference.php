<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Reference extends Model
{
    protected $table="references";
    protected $fillable = ['name','designation','organization','mobile','phone_office','phone_residential','email','address','description','reference_type_id','user_id',];

    public function referenceType(){
        return $this->belongsTo('App\Models\ReferenceType');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }


}
