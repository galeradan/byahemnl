<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Type extends Model
{
    //
    use SoftDeletes;

    public function make(){
    	return $this->belongsTo('App\Make');
    }

    public function assets(){
    	return $this->hasMany('App\Asset', 'model_id');
    }

    public function requests(){
    	return $this->belongsToMany('App\Request')->withPivot("quantity","deleted_at")->withTimestamps();
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }



}
