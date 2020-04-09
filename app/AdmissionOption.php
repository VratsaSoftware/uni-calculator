<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionOption extends Model
{
    protected $fillable = [
    						'major_id',
    ];

    public function formulas()
    {
    	return $this->hasMany('App\Formula');
    }
}
