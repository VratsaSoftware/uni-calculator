<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable= [ 'name',

    ];

    public function subfields(){

    	return $this->hasMany('App\Subfield');
    }
}
