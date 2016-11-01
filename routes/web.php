<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {
	Route::resource('merk', 'MerkController');
	Route::resource('kendaraan', 'KendaraanController');
	
	Route::get('export/merk', [
		'as' => 'export.merk',
		'uses' => 'MerkController@export'
		]);
	Route::post('export/merk', [
		'as' => 'export.merk.post',
		'uses' => 'MerkController@exportPost'
		]);

});
