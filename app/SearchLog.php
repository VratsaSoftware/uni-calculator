<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
     protected $fillable= [
    	'name',
    	'event_time',
    	'user_id',
    	'argument',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function setArgumentAttribute($value){
    	$this->attributes['argument'] = serialize($value);
    }

    public function getArgumentAttribute($value){
    	return  unserialize($value);
    }
}
