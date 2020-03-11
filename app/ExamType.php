<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $fillable = [
    						'name',
    ];

    public function formulas()
    {
    	return $this->hasMany('App\Formula');
    }
}
