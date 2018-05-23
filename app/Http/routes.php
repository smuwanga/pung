<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
	Route::get('/', 'HomeController@index');

    Route::auth();


    Route::group(['middleware' => ['auth']], function() {


	Route::get('/home', 'HomeController@index');


	Route::resource('users','UserController');


	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);

 
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);


	Route::get('patients',['as'=>'patients.index','uses'=>'PatientController@index','middleware' => ['permission:patient-list|patient-create|patient-edit|patient-delete']]);
	Route::get('patients/create',['as'=>'patients.create','uses'=>'PatientController@create','middleware' => ['permission:patient-create']]);
	Route::post('patients/create',['as'=>'patients.store','uses'=>'PatientController@store','middleware' => ['permission:patient-create']]);
	Route::get('patients/{id}',['as'=>'patients.show','uses'=>'PatientController@show']);
	Route::get('patients/{id}/edit',['as'=>'patients.edit','uses'=>'PatientController@edit','middleware' => ['permission:patient-edit']]);
	Route::patch('patients/{id}',['as'=>'patients.update','uses'=>'PatientController@update','middleware' => ['permission:patient-edit']]);
	Route::delete('patients/{id}',['as'=>'patients.destroy','uses'=>'PatientController@destroy','middleware' => ['permission:patient-delete']]);

	Route::get('facilities',['as'=>'facilities.index','uses'=>'FacilityController@index','middleware' => ['permission:patient-list|patient-create|patient-edit|patient-delete']]);
	Route::get('facilities/{id}',['as'=>'facilities.show','uses'=>'FacilityController@show']);
	
});