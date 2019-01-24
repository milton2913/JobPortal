<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class EducationLevel extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'education_levels';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'short_name',
                  'description',
                  'is_active'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the education for this model.
     */
    public function education()
    {
        return $this->hasOne('App\Models\Education','education_level_id','id');
    }


    public function degree()
    {
        return $this->hasOne('App\Models\Degree');
    }


}
