<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyCategory extends Model
{
    protected $fillable = [ 'type' ];

    public function company()
  	{
    	return $this->belongsTo('App\Company');
  	}
}
