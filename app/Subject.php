<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
    						'name',
    ];

    public function formulas()
    {
    	return $this->hasMany('App\Formula');
    }
}
