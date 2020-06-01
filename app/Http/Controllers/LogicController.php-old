<?php

namespace App\Http\Controllers;

use App\Subject;
use App\AdmissionOption;
use App\Major;
use App\Formula;
use App\ExamType;
use App\Field;
use App\Subfield;
use Illuminate\Http\Request;

class LogicController extends Controller
{
    public function best(Request $request)
    {
        $fields = Field::all();
        $subfields = Subfield::all();

    	// Finding the formulas where exam type is 1 or 2 

    	$formulas = Formula::where([
					    		['exam_type_id', '=' , 1],
					    		['subject_id', '=', $request->subject],
    						])
    						->orWhere([
    							['exam_type_id', '=' , 2],
    							['subject_id', '=', $request->subject]
    						])
    						->get();

    	// Finding the formulas where subject is the same with the request

    	$request_formulas = Formula::where([
    		['subject_id', '=', $request->subject],

    	])
    	->get();

    	// Finding the admission options when $formulas and $request_formulas id's are the same

    	$request_admission_options = [];
    	foreach ($formulas as $formula) {
    		foreach($request_formulas as $request_formula){
    			if ($formula->id == $request_formula->id) {
    				array_push($request_admission_options, $formula->admission_option_id);
    			};
    		};
    	};

    	$admission_options = AdmissionOption::all();

    	// Finding the majors id's

    	$majors_id = [];
    	foreach ($admission_options as $admission_option) {
    		foreach ($request_admission_options as $key => $value) {
    			if ($admission_option->id == $value) {
    				array_push($majors_id, $admission_option->major_id);
    			};
    		};
    	};
    	$unique_majors = array_unique($majors_id);
    	
    	// Finding the names of the Majors that we are the best

    	$majors = Major::all();
    	$answer = [];
    	foreach ($majors as $major) {
    		foreach ($unique_majors as $key => $value) {
    			if ($major->id == $value) {
    				array_push($answer, $major->id);
    			};
    		};
    	};

        // Strat Searching subfields>>>

        $major_subfield = [];
        foreach ($majors as $major) {
            foreach ($answer as $key => $value) {
                if ($major->id == $value) {
                    array_push($major_subfield, $major->subfield_id);
                };
            };
        };
        $major_subfields = array_unique($major_subfield);

        // End Searching subfields<<<

        // Strat Searching majors>>
        
        $major_field = [];
        foreach ($subfields as $subfield) {
            foreach ($major_subfields as $key => $value) {
                if ($subfield->id == $value) {
                    array_push($major_field, $subfield->field_id);
                };
            };
        };
        $major_fields = array_unique($major_field);

        // End Searching majors<<<

    	return view('logic.best', compact('answer', 'fields', 'subfields', 'majors','major_subfields', 'major_fields'));
    }
}
