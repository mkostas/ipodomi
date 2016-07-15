<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramOfActivities extends Model
{
    protected $table = 'programs_of_activities';

    protected $fillable = [ 'name', 'filepath', 'school', 'company_category', 'lang' ];

    public function languages()
    {
        return $this->hasMany('App\Language', 'id', 'lang');
    }

    public function schools()
    {
        return $this->belongsTo('App\School', 'school', 'id');
    }

    public function company_categories()
    {
        return $this->belongsTo('App\CompanyCategory', 'company_category', 'id');
    }
}
