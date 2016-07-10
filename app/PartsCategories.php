<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartsCategories extends Model
{	
	protected $fillable = [ 'parent','name' ];

	//each category might have one parent
	public function parent() {
		return $this->belongsToOne(static::class, 'parent');
	}

	//each category might have multiple children
	public function children() {
		return $this->hasMany(static::class, 'parent');
	}
}
