<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Checklist extends Model
{
    //
    use SoftDeletes;
     public function maintenances(){
    	return $this->belongsToMany('App\Maintenance')->withPivot("notes","deleted_at")->withTimestamps();
    }
}
