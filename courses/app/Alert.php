<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    public function course()
	{

		return $this->belongsTo('App\Course');
		
	}
}
