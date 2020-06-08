<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subfield;
use App\Program;
use App\University;
use App\Major;
use App\SearchLog;
use Illuminate\Support\Facades\Auth;
use App\AdmissionOption;
use App\Formula;


class CalculatorsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $major_id = $request->major_id;
        $user_evals = $request->user_evals;
        $coefficients = $request->coefficient;      

        //Multiplying each grade with the corresponding coefficient 
        $sum = [];
        foreach($user_evals as $var => $grades){
            if(isset($grades)){
                foreach($grades as $pos => $grade){
                    $sum[$var][] = $grade * $coefficients[$var][$pos];
                }    
            } else{
                $sum[$var][] = 0;                 
            }
        }

        //Calculating the bal for each admission option
        $bal = [];
        foreach ($sum as $var => $value) {
           $bal[$var] = array_sum($sum[$var]);
        }
       
        return redirect()->back()->with('bal', $bal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get selected major form majors_table
        $major = Major::with('formulas')->find($id);

        // Find all admission options for the selected major in admission_otions_table
        $major_admission_options = AdmissionOption::where('major_id', $id)->get();

        // Get all the ids of the admission options -> all the formulas
        $admission_options_ids = [];
        foreach ($major_admission_options as $option) {
            array_push($admission_options_ids, $option->id);
        }

        // Get all the rows that form a single formula
        $formulas = Formula::whereIn('admission_option_id', $admission_options_ids )->get();

        return view('calculators.show',  compact('major', 'formulas'));
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
