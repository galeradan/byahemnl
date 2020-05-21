<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Phase extends Model
{
    //
    use SoftDeletes;
    public function assets(){
    	return $this->hasMany('App\Asset');
    }

}
