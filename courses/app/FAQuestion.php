<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQuestion extends Model
{
    protected $table = 'f_a_questions';

    protected $fillable = ['question', 'answer'];
}
