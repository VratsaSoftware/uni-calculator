<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
	protected $fillable = [
    						'exam_type_id',
    						'subject_id',
    						'coefficient',
    						'grade',
    						'admission_option_id',
    ];

    public function examTypes()
    {
    	return $this->hasMany('App\ExamType');
    }
    public function subjects()
    {
    	return $this->hasMany('App\Subject');
    }
    public function admissionOptions()
    {
    	return $this->hasMany('App\AdmissionOption');
    }
}
