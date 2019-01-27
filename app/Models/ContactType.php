<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    protected $table="contact_types";
    protected $fillable = ['title','icon_class','is_active'];
}
