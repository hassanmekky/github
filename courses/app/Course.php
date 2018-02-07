<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

	protected $fillable = [ 

		'course_name', 'prev_know', 'intro_video', 'description', 'image', 'exp_gender', 'course_price', 'cert_name', 'cert_orgnization','cert_price', 'start_date', 'end_date', 

	];

    public function category()
	{

		return $this->belongsTo('App\Category');
		
	}

	public function user()
	{

		return $this->belongsTo('App\User');
		
	}

	public function lesson()
	{

		return $this->hasMany('App\Lesson');
		
	}

	public function users()
    {

        return $this->belongsToMany('App\User');
        
    }

    public function comment()
	{

		return $this->hasMany('App\Comment');
		
	}

	public function alert()
	{

		return $this->hasMany('App\Alert');
		
	}

	public function message()
	{

		return $this->hasMany('App\Message');
		
	}

	public function rating()
	{

		return $this->hasMany('App\Rating');
		
	}


	public function questions()
	{

		return $this->hasMany('App\Question');
		
	}

	public function quizresults()
	{

		return $this->hasMany('App\QuizResults');
		
	}

	public function certificate()
	{

		return $this->hasMany('App\Certificate');
		
	}
}
