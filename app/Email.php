<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $table = 'emails_sent';

	protected $fillable = [ 'school_id','email_from','email_to','subject','content','comments'];

    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
