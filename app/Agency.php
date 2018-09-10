<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency extends Model
{
	public function agreement()
    {
        return $this->hasMany('App\Agreement');
    }

    use SoftDeletes;
}