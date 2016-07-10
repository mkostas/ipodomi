<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LettersOfIntent extends Model
{
	protected $table = 'letters_of_intent';

    protected $fillable = [ 'school_id', 'content', 'comment', 'lang' ];

    public function languages()
    {
        return $this->hasMany('App\Language', 'id', 'lang');
    }
    
    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
