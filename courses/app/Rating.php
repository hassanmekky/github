<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['rating', 'comment'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function course()
  {
    return $this->belongsTo('App\Course');
  }
}
