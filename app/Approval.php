<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Approval extends Model
{
    //
    use SoftDeletes;

    public function requests() {
    	return $this->hasMany('App\Request');
    }
}
