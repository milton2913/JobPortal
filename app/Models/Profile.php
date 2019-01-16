<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   protected $table="profiles";
    protected $fillable = [
        'user_id',
        'country_id',
        'district_id',
        'father_name',
        'mother_name',
        'nid',
        'passport_no',
        'birth_certificate',
        'address',
        'post_code',
        'date_of_birth',
        'gender',
        'marital_status'
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
     * Get the user for this model.
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    /**
     * Get the country for this model.
     */
    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id','id');
    }

    /**
     * Get the district for this model.
     */
    public function district()
    {
        return $this->belongsTo('App\Models\District','district_id','id');
    }

    /**
     * Set the date_of_birth.
     *
     * @param  string  $value
     * @return void
     */
    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Get date_of_birth in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDateOfBirthAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y', $value);

    }
}
