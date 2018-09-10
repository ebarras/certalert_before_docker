<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cert extends Model
{
	public function agreement()
    {
        return $this->belongsTo('App\Agreement');
    }

    use SoftDeletes;
}
