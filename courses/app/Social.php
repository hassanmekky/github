<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'sociallinks';

    protected $fillable = ['name', 'url_link'];

    public $timestamps = false;
}
