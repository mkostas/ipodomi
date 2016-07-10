<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [ 'country_id','city','name','contact_person','email','phones','fax','cancelled','not_submitted','sent_section' ];

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
