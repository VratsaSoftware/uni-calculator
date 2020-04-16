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

    public function exams()
    {
    	return $this->belongsTo('App\ExamType', 'exam_type_id');
    }
    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }
    public function majors()
    {
    	return $this->belongsToMany('App\Major', 'admission_options', 'id', 'major_id');
    }
}
