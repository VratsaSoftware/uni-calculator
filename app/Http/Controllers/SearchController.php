<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subfield;
use App\Program;
use App\University;
use App\Major;
use App\Http\Controllers\DB;
use App\SearchLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\AdmissionOption;
use App\Formula;
use App\Field;
use App\Subject;


class SearchController extends Controller
{
    public function displaySearch()
    {
       
        $fields = Field::all();
        $subfields = Subfield::all();
        $programs = Program::all();
        $subjects = Subject::all();
        $majors = Major::all();
        $uni_id  = [];
        $list = [];
        $university_list =[];


       // Find all the universities that have filled in majors
        foreach ($majors as $major) {
           array_push($uni_id, $major->university_id);
        }

        // Return unique universities
        foreach ($uni_id as $value) {
            $list[] = University::where([ ['id', $value] ])->get();
            $university_list = array_unique($list);
        }

        $subf_id = [];
        $subf_list = [];
        $subfields_list = [];

        // Find all the universities that have filled in majors
        foreach ($majors as $major) {
           array_push($subf_id, $major->subfield_id);
        }

        // Return unique universities
        foreach ($subf_id as $value) {
            $subf_list[] = Subfield::where([ ['id', $value] ])->get();
            $subfields_list = array_unique($subf_list);
        }

        return view('search.display', compact('fields', 'subfields_list' , 'programs', 'subjects', 'university_list'));
    }

    
    public function FirstSearchRes(Request $request)
    {
        // Check for input data

        $selectsubject = $request->subject;

        if ($selectsubject === null) {

            $errmsg = [
                'subjectmsg' => '* Моля изберете учебен предмет!',
            ];

            return redirect()->back()->with('errmsg', $errmsg);
        }
        else
        {
            $this->logHistoryFirst($request->subject);

            $fields = Field::all();
            $subfields = Subfield::all();


            //Get subject name;
            $subject = Subject::where([ ['id', $request->subject] ])->get();
            $subject_name = $subject[0]->name;

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

            return view('search.first', compact('subject_name', 'answer', 'fields', 'subfields', 'majors','major_subfields', 'major_fields'));
        }
    }

    public function SecondSearchRes(Request $request)
    {
        // Check for input data
        $selectsubfield = $request->subfield_id;
        $selectuniversity = $request->university_id;


        if ($selectsubfield === null && $selectuniversity === null) {

            $errmsg = [
                'subfieldmsg' => '* Моля изберете поднаправление!',
                'universitymsg' => '* Моля изберете университет!',
            ];

            
            return redirect()->back()->with('errmsg', $errmsg);
        }
        // Find the major corresponding to all search criteria
        elseif (($selectsubfield !== null && $selectuniversity !== null)) {
            
            $this->logHistorySecond($request->subfield_id,$request->program_id,$request->university_id,$request->form);

            $majors_specific = Major::with('subfield' ,'program', 'university')->where([

            ['subfield_id', $request->subfield_id],
            ['program_id', $request->program_id],
            ['university_id', $request->university_id],
            ['form', $request->form],
       
           ])->get();  

           return view('search.second', compact('majors_specific') ); 
        }elseif (($selectsubfield !== null || $selectuniversity !== null)) {

            // In case there is no university chosen, execute search for majors in all universities
            if ($selectsubfield !== null) {

                $university_id = null;

                $this->logHistorySecond($request->subfield_id,$request->program_id,$university_id,$request->form);
                $majors_subfield = Major::with('subfield' ,'program', 'university')->where([
                    ['subfield_id', $request->subfield_id],
                    ['program_id', $request->program_id],
                    ['form', $request->form],
               ])->get();

                return view('search.second', compact('majors_subfield') );
            }
            // In case there is no subfield chosen, execute search for majors in all subfields
            elseif ($selectuniversity !== null) {
                 
                $subfield_id = null;

                $this->logHistorySecond($subfield_id,$request->program_id,$request->university_id,$request->form);
                $majors_university = Major::with('subfield' ,'program', 'university')->where([
                    ['university_id', $request->university_id],
                    ['program_id', $request->program_id],
                    ['form', $request->form],
               ])->get();

                return view('search.second', compact('majors_university') );
            }
        }
    }

     public function logHistoryFirst($subject_id)
    {
        $data = [];

        $subject = Subject::find($subject_id);
        $data = $subject->name;
        $user = Auth::user();
        $id = Auth::id();
        $history = new SearchLog;
        $history->event_time = Carbon::now();
        $history->argument = $data;
        $history->user_id = $id;
        $history->save();

    }    

    public function logHistorySecond($subfield_id,$program_id,$university_id, $form)
    {
        $data = [];
        // Check subfield_id and get data
        if ($subfield_id !== null) {
            $subfield = Subfield::find($subfield_id);
            $data[] = $subfield->name;
        }else {
            $data[] = 'Всички поднаправления';
        }
        //Get program
        $program = Program::find($program_id);
        $data[] = $program->name;
        // Check university_id and get data
        if ($university_id !== null) {
            $university = University::find($university_id);
            $data[] = $university->name;
        } else {
            $data[] = 'Всички университети';
        }
        //Get form
        $data[] = $form;
        //Log history 
        $user = Auth::user();
        $id = Auth::id();
        $history = new SearchLog;
        $history->event_time = Carbon::now();
        $history->argument = $data;
        $history->user_id = $id;
        $history->save();
    }
}

