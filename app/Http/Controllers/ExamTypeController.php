<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\ExamType;
use Illuminate\Http\Request;
use App\Http\Requests\ExamTypeRequest;
use App\Http\Controllers\Controller;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam_types = DB::table('exam_types')->paginate(15);

        return view('exam_type.index', compact('exam_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exam_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamTypeRequest $request)
    {
        ExamType::create([
            'name'=> $request->name
        ]);

        return redirect()->route('exam_type.index')
            ->withMessage('Вида е успешно създаден!');
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
        $exam_type = ExamType::find($id);
        return view('exam_type.edit', compact('exam_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamTypeRequest $request, $id)
    {
        $exam_type = ExamType::find($id);
        $exam_type->update([
            'name' => $request->name
        ]);

        return redirect()->route('exam_type.index')
            ->withMessage('Вида е успешно променен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam_type = ExamType::find($id);

        $exam_type->delete();
        return redirect()->route('exam_type.index')
                ->withMessage('Вида е изтрит успешно!');
    }
}
