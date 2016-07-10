<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{	
	protected $fillable = [ 'category_id','name','place','contact_person','email', 'phones', 'fax', 'comments'];

    public function companyCategory()
    {
        return $this->hasMany('App\CompanyCategory', 'id', 'category_id');
    }
}
