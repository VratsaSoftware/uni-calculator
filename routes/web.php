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

Auth::routes();

Route::get('/manage', 'ManageController@index')->name('manage');

Route::resource('cities', 'CitiesController');
Route::resource('universities', 'UniversitiesController');
Route::resource('fields', 'FieldsController');
Route::resource('subfields', 'SubfieldsController');
Route::resource('subject', 'SubjectController');
Route::resource('exam_type', 'ExamTypeController');
Route::resource('formula', 'FormulaController')->except(['create', 'store']);
Route::get('formula/{formula}/create', 'FormulaController@create')->name('formula.create');
Route::post('formula/{formula}/create', 'FormulaController@store')->name('formula.store');
Route::resource('major', 'MajorController');
Route::post('/home/best', 'LogicController@best')->name('best');


Route::get('/home', 'HomeController@index')->name('home');

