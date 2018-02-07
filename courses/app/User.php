<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function course()
    {

        return $this->hasMany('App\Course');
        
    }

    public function courses()
    {

        return $this->belongsToMany('App\Course');
        
    }

    public function comment()
    {

        return $this->hasMany('App\Comment');
        
    }

    public function rating()
    {

        return $this->hasMany('App\Rating');
        
    }

    public function lessons()
    {

        return $this->belongsToMany('App\Lesson');
        
    }

    public function quizresults()
    {

        return $this->hasMany('App\QuizResults');
        
    }

    public function certificate()
    {

        return $this->hasMany('App\Certificate');
        
    }

    use Notifiable;

    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phonenumber', 'gender', 'role',
    ];

    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
