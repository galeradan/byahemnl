<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Garage extends Model
{
    //
    use SoftDeletes;
    public function assets(){
    	return $this->hasMany('App\Asset');
    }

}
