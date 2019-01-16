<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table="permissions";

    protected $fillable = ['permission_category_id','namespace','controller','method','action','display','allowed','detail'];
    public function service(){
        return $this->hasOne('Models\Service');
    }

}
