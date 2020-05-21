<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Asset extends Model
{
    //
    use SoftDeletes;


    public function documents(){
    	return $this->belongsToMany('App\Document')->withPivot("expiration_date","deleted_at")->withTimestamps();
    }

     public function type(){
    	return $this->belongsTo('App\Type',"model_id");
    }

     public function garage(){
    	return $this->belongsTo('App\Garage');
    }

     public function phase(){
    	return $this->belongsTo('App\Phase');
    }

     public function user(){
    	return $this->belongsTo('App\User');
    }

     public function maintenances(){
    	return $this->hasMany('App\Maintenance');
    }

    public function rentals(){
        return $this->belongsToMany('App\Rental')->withPivot("deleted_at")->withTimestamps();
    }
}
