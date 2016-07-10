<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramOfActivities extends Model
{
    protected $table = 'programs_of_activities';

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
