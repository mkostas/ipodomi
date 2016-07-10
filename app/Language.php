<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [ 'name','is_valid','icon', 'slag' ];

    public function partsText()
  	{
    	return $this->belongsTo('App\PartsText');
  	}

  	public function lettersOfIntent()
  	{
    	return $this->belongsTo('App\LettersOfIntent');
  	}

  	public function instructions()
  	{
    	return $this->belongsTo('App\Instructions');
  	}

  	public function programofactivities()
  	{
    	return $this->belongsTo('App\ProgramOfActivities');
  	}
}
