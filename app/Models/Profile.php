<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   protected $table="profiles";
    protected $fillable = [
        'user_id',
        'marital_status',
        'religion',
        'blood',
        'country_id',
        'father_name',
        'mother_name',
        'alternate_email',
        'alternate_mobile',
        'identity_type',
        'identity_no',
        'user_id',
        'dob'
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
        return $this->belongsTo('App\Models\User','user_id','id');
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

        $this->attributes['dob'] = !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Get date_of_birth in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('b-m-Y');
    }
    public function getDateOfBirthAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-b');


        //return \DateTime::createFromFormat('j/n/Y', $value);
        //$date  = \DateTime::createFromFormat('1991/12/31');
        //$epoch = $date->getTimestamp();

        //dd($date);
    }
}
