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


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subfields = Subfield::all();
        $programs = Program::all();
        $universities = University::all();

        return view('search.create', compact('subfields', 'programs', 'universities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->logHistory($request->subfield_id,$request->program_id,$request->university_id,$request->form);
   
        $majors_specific = Major::with('subfield' ,'program', 'university')->where([

        ['subfield_id', $request->subfield_id],
        ['program_id', $request->program_id],
        ['university_id', $request->university_id],
        ['form', $request->form],
   
       ])->get();

        $majors_subfield = Major::where('subfield_id', $request->subfield_id)->get();
        $majors_program = Major::where('program_id', $request->program_id)->get();
        $majors_university = Major::where('university_id', $request->university_id)->get();


        return view('search.store', compact('majors_program', 'majors_subfield', 'majors_university', 'majors_specific') ); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logHistory($subfield_id,$program_id,$university_id, $form)
    {
        $data = [];

        $subfield = Subfield::find($subfield_id);
        $data[] = $subfield->name;
        $program = Program::find($program_id);
        $data[] = $program->name;
        $university = University::find($university_id);
        $data[] = $university->name;
        $data[] = $form;
        $user = Auth::user();
        $id = Auth::id();
        $history = new SearchLog;
        $history->event_time = Carbon::now();
        $history->argument = $data;
        $history->user_id = $id;
        $history->save();
    }
}

