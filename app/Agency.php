<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency extends Model
{
	public function comments()
    {
        return $this->hasMany('App\Agreement');
    }

    use SoftDeletes;
}