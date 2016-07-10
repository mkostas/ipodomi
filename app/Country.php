<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [ 'name','is_valid'];

    public function schools()
  	{
    	return $this->belongsTo('App\School');
  	}
}
