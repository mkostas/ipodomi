<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    protected $table = 'instructions';

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
