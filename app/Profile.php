<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable= [ 
    	'address', 
    	'info', 
    	'img_path', 
    	'rating',

    ];

    public function university(){
        return $this->belongsTo('App\University');
    }
     
}
