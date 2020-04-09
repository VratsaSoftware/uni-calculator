<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable= ['name'];
	    
	public function universities(){
    	return $this->hasMany('App\University');
    }
}
