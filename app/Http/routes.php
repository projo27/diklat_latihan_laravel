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

// Route::get('/', function () {
//     //return view('welcome');
//     //return "Paijo";

//     return view('pages.homepage');
// });

// Route::get('about', function () {
//     return view('pages.about');
// });

// Route::get('hokya', function () {
//     return view('pages.hokya');
// });

// Route::get('/murid/{id}/{nama}', function ($id, $nama) {
//     //return view('welcome');
//     return "Hai ".$nama." ID : ".$id;
// });

// Route::get('master/halaman-pegawai', function () {
//     return 'Halaman pegawai';
// })->name('pegawai');

// Route::get('pgw', function () {
//     return redirect()->route('pegawai');
// });

// Route::get('siswa', function () {
//     $siswa = ["Abdul", "Budi", "Caca", "Dedi", "Eni", "Faijo"];
//     return view('siswa.index', compact('siswa'));
// });

Route::get('/', 'HomepageController@index');
Route::get('about', 'AboutController@index');
//Route::get('siswa', 'SiswaController@index');

Route::get('siswa/cari', 'SiswaController@cari');
Route::group(['midleware' => ['web']], function(){
    Route::resource('siswa', 'SiswaController');
});
// Route::get('siswa', 'SiswaController@paging');
// Route::get('siswa/create', 'SiswaController@create');
// Route::post('siswa', 'SiswaController@store');
// Route::get('siswa/{id_siswa}', 'SiswaController@show');
// Route::get('siswa/{id_siswa}/edit', 'SiswaController@edit');
// Route::patch('siswa/{id_siswa}', 'SiswaController@update');
// Route::delete('siswa/{id_siswa}', 'SiswaController@destroy');


Route::get('tes-collection', 'SiswaController@tesCollection');
Route::get('date-mutator', 'SiswaController@dateMutator');