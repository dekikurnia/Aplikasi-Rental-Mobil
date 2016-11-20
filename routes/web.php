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
	Route::resource('pelanggan', 'PelangganController');
	Route::resource('type', 'TypeController');
	Route::resource('peminjaman', 'PeminjamanController');
	
	Route::get('export/merk', [
		'as' => 'export.merk',
		'uses' => 'MerkController@export'
		]);

	Route::post('export/merk', [
		'as' => 'export.merk.post',
		'uses' => 'MerkController@exportPost'
		]);

	Route::get('export/pelanggan', [
		'as' => 'export.pelanggan',
		'uses' => 'PelangganController@export'
		]);

	Route::post('export/pelanggan', [
		'as' => 'export.pelanggan.post',
		'uses' => 'PelangganController@exportPost'
		]);

	Route::get('pinjam/{kendaraan}', [
		'as' => 'pinjam.kendaraan',
		'uses' => 'PeminjamanController@pinjam'
		]);

	Route::get('pesan/send', 'PesanController@form')->name('pesan.form');
	Route::post('pesan/send', 'PesanController@send')->name('pesan.send');
});

