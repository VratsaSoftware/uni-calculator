<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Major;
use App\Subfield;
use App\Program;
use App\University;




class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::with('subfield', 'program', 'university' )->get();
        return view('majors.index', compact('majors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors= Major::with('subfield', 'program', 'university' )->get();
        $subfields = Subfield::all();
        $programs = Program::all();
        $universities = University::all();

        return view('majors.create', compact('majors'), compact('subfields', 'programs', 'universities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $major = new Major;
        $major->name = $request->name;
        $major->subfield_id = $request->subfield_id;
        $major->form = $request->form;
        $major->program_id = $request->program_id;
        $major->max_score = $request->max_score;
        $major->university_id = $request->university_id;

        $major->save();

        return redirect()->back()->with('message', 'Добавена е нова специалност в базата данни!');
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
        $major = Major::find($id);
        $subfields = Subfield::all();
        $programs = Program::all();
        $universities = University::all();
        return view('majors.edit',  compact('major'), compact('subfields', 'programs','universities'));
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
        $major = Major::find($id);
        $major->name = $request->name;
        $major->subfield_id = $request->subfield_id;
        $major->form = $request->form;
        $major->program_id = $request->program_id;
        $major->max_score = $request->max_score;
        $major->university_id = $request->university_id;

        $major->save();

        return redirect()->back()->with('message', 'Записът беше променен успешно!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $major = Major::find($id);
        $major->delete();
        return redirect()->back()->with('message', 'Тази специалност беше изтрита успешно от базата данни!');
    }
}
