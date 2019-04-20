<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployerContact extends Model
{
    protected $table='employer_contacts';
    protected $fillable = ['name','email','mobile','designation','employer_id','username','password','is_active'];

    public function employer(){
        return $this->belongsTo('App\Models\Employer');
    }
}
