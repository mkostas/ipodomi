<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartsText extends Model
{
	protected $table = 'parts_text';
    protected $fillable = [ 'part_category','content', 'company_category', 'lang' ];

    public function languages()
    {
        return $this->hasMany('App\Language', 'id', 'lang');
    }

    public function companyCategory()
    {
        return $this->hasMany('App\CompanyCategory', 'id', 'company_category');
    }
}
