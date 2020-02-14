<?php

namespace App\Http\Controllers;

use App\University;
use App\City;
use App\Profile;



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
       
       $universities = University::with('cities')->get();
        return view('universities.index', compact('universities'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities= University::with('cities')->get();
        $cities = City::all();
        return view('universities.create', compact('universities'), compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Profile;
        $profile->address = null; 
        $profile->info = null;
        $profile->img_path = null;
        $profile->rating = null;
        $profile->save();

        return redirect()->back()->with('message', dd($profile));



    
        $university = new University;
        $university->name = $request->name;
        $university->city_id = $request->city_id;
        $university->profile_id = $profile->id;


        $university->save();

       //$university->save();


        return redirect()->back()->with('message', 'Добавен е нов град в базата данни!');
        
        
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
