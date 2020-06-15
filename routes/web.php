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
Route::get('/', 'SearchController@displaySearch')->name('home');
Route::post('/results/1', 'SearchController@FirstSearchRes')->name('results/1');
Route::post('/results/2', 'SearchController@SecondSearchRes')->name('results/2');



Auth::routes();

Route::resource('search', 'SearchController');
Route::post('/home/best', 'LogicController@best')->name('best');
Route::resource('calculators', 'CalculatorsController');
Route::resource('major', 'MajorController');
Route::resource('formula', 'FormulaController');

Route::group(['middleware' => ['auth', 'adminauth']], function(){
	Route::get('/manage', 'ManageController@index')->name('manage');
	Route::resources([
		'cities' => 'CitiesController',
		'universities' => 'UniversitiesController',
		'fields' => 'FieldsController',
		'subfields' => 'SubfieldsController',
		'majors' => 'MajorsController',
		'roles' => 'RolesController',
		'users' => 'UsersController',
		'subject' => 'SubjectController',
		'exam_type' => 'ExamTypeController',
	]);
	Route::resource('formula', 'FormulaController')->except(['create', 'store']);
	Route::get('formula/{formula}/create', 'FormulaController@create')->name('formula.create');
	Route::post('formula/{formula}/create', 'FormulaController@store')->name('formula.store');
});