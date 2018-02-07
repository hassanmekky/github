<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

	protected $fillable = [ 'lesson_name', 'lesson_video', 'description', 'files', 'order'];

   public function course()
	{

		return $this->belongsTo('App\Course');
		
	}

	public function users()
    {

        return $this->belongsToMany('App\User');
        
    }
}
