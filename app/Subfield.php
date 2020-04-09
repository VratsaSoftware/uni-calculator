<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subfield extends Model
{
    protected $fillable= [ 
		'name',
		'field_id'
    ];
    
    public function field(){
        return $this->belongsTo('App\Field', 'field_id');
    }
}
