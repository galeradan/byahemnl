<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Request extends Model
{
    //
    use SoftDeletes;
    public function approval(){
    	return $this->belongsTo('App\Approval');
    }
    public function types(){
    	return $this->belongsToMany('App\Type')->withPivot("quantity","deleted_at")->withTimestamps();
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function rental(){
        return $this->hasOne('App\Rental');
    }




}
