<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index');


Route::get('/', function () {
    return view('welcome');
});


Route::resource('cities', 'CitiesController');
Route::resource('universities', 'UniversitiesController');
Route::resource('fields', 'FieldsController');
Route::resource('subfields', 'SubfieldsController');
Route::resource('majors', 'MajorsController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

