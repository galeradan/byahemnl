<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Condition extends Model
{
    //
    use SoftDeletes;
    public function maintenances(){
    	return $this->hasMany('App\Maintenance');
    }
}
