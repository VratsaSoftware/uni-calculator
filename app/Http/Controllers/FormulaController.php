<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; 
use App\Subject;
use App\AdmissionOption;
use App\ExamType;
use App\Major;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

class FormulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $exam_types = ExamType::all();
        $subjects = Subject::all();
        $major = Major::find($id);

        return view('formula.create', compact('subjects', 'exam_types', 'major'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        Formula::create([
            'exam_type_id'=> $request->exam_type ,
            'subject_id' => $request->subject ,
            'coefficient' => $request->coefficient ,
            'grade' => $request->grade ,
            'admission_option_id' => $request->admission_option ,
        ]);

        return redirect()->route('major.index')
            ->withMessage('Формулата е успешно създадена!');
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
}
