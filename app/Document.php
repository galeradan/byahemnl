<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Document extends Model
{
    //
    use SoftDeletes;
    public function assets(){
    	return $this->belongsToMany('App\Asset')->withPivot("expiration_date","deleted_at")->withTimestamps();
    }
}
