<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    
    public function __construct() 
	{
	  $this->middleware('adminauth');
	}
    public function index()
    {
    	return view('manage');
    }
}
