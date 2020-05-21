<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Rental extends Model
{
    //
    use SoftDeletes;
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function status(){
    	return $this->belongsTo('App\Status');
    }

    public function assets(){
        return $this->belongsToMany('App\Asset')->withPivot("deleted_at")->withTimestamps();
    }

    public function request(){
        return $this->belongsTo('App\Request');
    }

}
