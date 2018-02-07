<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizResults extends Model
{

	protected $fillable = ['user_id', 'course_id', 'score'];
	
    public function course()
	{

		return $this->belongsTo('App\Course');
		
	}

	public function user()
	{

		return $this->belongsTo('App\User');
		
	}
}
