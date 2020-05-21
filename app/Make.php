<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Make extends Model
{
    //
    use SoftDeletes;
    public function types(){
    	return $this->hasMany('App\Type');
    }

}
