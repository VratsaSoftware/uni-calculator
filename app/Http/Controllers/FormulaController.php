<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; 
use App\Subject;
use App\AdmissionOption;
use App\ExamType;
use App\Major;
use App\Formula;
use Illuminate\Http\Request;
use App\Http\Requests\FormulaRequest;

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
    public function store(FormulaRequest $request, $id)
    {

        AdmissionOption::create([
            'major_id' => $id,
        ]);
        
        $last_id = AdmissionOption::all()->last()->id;

        foreach ($request->exam_type as $key => $value) {
            $data = [
                    'exam_type_id'=> $request->exam_type[$key] ,
                    'subject_id' => $request->subject[$key] ,
                    'coefficient' => $request->coefficient[$key] ,
                    'grade' => $request->grade[$key] ,
                    'admission_option_id' => $last_id ,
            ];
            Formula::insert($data);
        }

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
        $exam_types = ExamType::all();
        $subjects = Subject::all();
        $admission_option = AdmissionOption::find($id);
        $formulas = DB::table('formulas')->where('admission_option_id', $id)->get();

        return view('formula.edit', compact('admission_option', 'formulas', 'exam_types', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormulaRequest $request, $id)
    {
        $formulas = DB::table('formulas')->where('admission_option_id', $id)->get();

        foreach ($request->exam_type as $key => $value) {
            $data = array(
                'exam_type_id'=> $request->exam_type[$key] ,
                'subject_id' => $request->subject[$key] ,
                'coefficient' => $request->coefficient[$key] ,
                'grade' => $request->grade[$key] ,
            );
            Formula::where('id', $formulas[$key]->id)->update($data);
        }

        return redirect()->route('major.index')
            ->withMessage('Формулата е успешно променена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Formula::where('admission_option_id', $id)->delete();
        AdmissionOption::where('id', $id)->delete();
        
        return redirect()->route('major.index')
                ->withMessage('Формулата е изтрита успешно!');
    }
}
