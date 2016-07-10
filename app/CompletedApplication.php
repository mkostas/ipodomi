<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompletedApplication extends Model
{
    protected $fillable = [ 'name', 'filepath', 'lang' ];

    public function languages()
    {
        return $this->hasMany('App\Language', 'id', 'lang');
    }
}
