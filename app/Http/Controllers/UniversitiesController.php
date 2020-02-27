<?php

namespace App\Http\Controllers;

use App\University;
use App\City;
use App\Profile;
use App\Http\Requests\CreateUniversityRequest;
use Illuminate\Http\Request;

class UniversitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $universities = University::with('city')->get();

        return view('universities.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities= University::with('city')->get();
        $cities = City::all();

        return view('universities.create', compact('universities'), compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUniversityRequest $request)
    {
        $profile = new Profile;
        $profile->save();

        $university = new University;
        $university->name = $request->name;
        $university->city_id = $request->city_id;
        $university->profile_id = $profile->id;
        $university->save();

        return redirect()->back()->with('message', 'Добавен е нов университет в базата данни!');
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
       $university = University::find($id);
       $cities = City::all();
       
       return view('universities.edit',  compact('university'), compact('cities'));
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
        $university = University::find($id);
        $cities = City::all();
        $university->name = $request->name;
        $university->city_id=$request->city_id;
        $university->save();

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
        $university = University::find($id);
        $university->delete();
        
        return redirect()->back()->with('message', 'Този университет беше изтрито успешно от базата данни!');
    }
}
