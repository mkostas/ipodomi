<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartsText extends Model
{
	protected $table = 'parts_text';
    protected $fillable = [ 'part_category','content', 'lang' ];

    public function languages()
    {
        return $this->hasMany('App\Language', 'id', 'lang');
    }
}
