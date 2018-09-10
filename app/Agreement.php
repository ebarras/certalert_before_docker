<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agreement extends Model
{
	public function agency()
    {
        return $this->belongsTo('App\Agency');
    }

    use SoftDeletes;
}
