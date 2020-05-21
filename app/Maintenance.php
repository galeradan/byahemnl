<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Maintenance extends Model
{
    //
    use SoftDeletes;

    public function checklists(){
    	return $this->belongsToMany('App\Checklist')->withPivot("notes","deleted_at")->withTimestamps();
    }
    public function asset(){
    	return $this->belongsTo('App\Asset');
    }
    public function condition(){
    	return $this->belongsTo('App\Condition');
    }
}
