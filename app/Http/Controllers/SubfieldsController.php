<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Subfield;


class SubfieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subfields = Subfield::with('fields')->get();
        return view('subfields.index', compact('subfields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subfields= Subfield::with('fields')->get();
        $fields = Field::all();
        return view('subfields.create', compact('subfields'), compact('fields'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $subfield = new Subfield;
        $subfield->name = $request->name;
        $subfield->field_id= $request->field_id;
        $subfield->save();

        return redirect()->back()->with('message', 'Добавено е ново поднаправление в базата данни!');

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
        $subfield = Subfield::find($id);
        $fields = Field::all();
        return view('subfields.edit', compact('subfield'), compact('fields'));
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
        $subfield = Subfield::find($id);
        $fields = Field::all();

        $subfield->name = $request->name;
        $subfield->field_id=$request->field_id;
        
        $subfield->save();

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
        $subfield = Subfield::find($id);
        $subfield->delete();
        return redirect()->back()->with('message', 'Това направление град беше изтрито успешно от базата данни!');
    }
}
