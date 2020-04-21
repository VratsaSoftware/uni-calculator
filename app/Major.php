<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable= [ 
    	'name', 
    	'subfield_id', 
    	'form', 
    	'program_id',
    	'max_score',
    	'university_id',
    ];

    public function subfield(){
        return $this->belongsTo('App\Subfield', 'subfield_id');
    }
    public function program(){
        return $this->belongsTo('App\Program', 'program_id');   
    } 
    public function university(){
        return $this->belongsTo('App\University', 'university_id');
    }
    public function formulas()
    {
        return $this->belongsToMany('App\Formula', 'admission_options', 'major_id', 'id' );
    }
}
