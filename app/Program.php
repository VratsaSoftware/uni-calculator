<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable= [ 'name',

    ];
    public function majors(){

    	return $this->hasMany('App\Major');
    }
}
