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

Route::get('/', function () {
    return view('index');
});

Route::get('/items/create', 'ItemController@create'); // menampilkan halaman form
Route::post('/items', 'ItemController@store'); // menyimpan data
Route::get('/items', 'ItemController@index'); // menampilkan semua
Route::get('/items/{id}', 'ItemController@show'); // menampilkan detail item dengan id 
Route::get('/items/{id}/edit', 'ItemController@edit'); // menampilkan form untuk edit item
Route::put('/items/{id}', 'ItemController@update'); // menyimpan perubahan dari form edit
Route::delete('/items/{id}', 'ItemController@destroy'); // menghapus data dengan id

Route::get('/artikel', 'ArtikelController@index'); //menampilkan data artikel
Route::get('/artikel/create', 'ArtikelController@create'); //menampilkan halaman form
Route::post('/artikel', 'ArtikelController@store'); //menyimpan data artikel
Route::get('/artikel/{id}', 'ArtikelController@show'); //menampilkan detail item dengan id
Route::get('/artikel/{id}/edit', 'ArtikelController@edit'); //menampilkan form untuk update item
Route::put('/artikel/{id}', 'ArtikelController@update'); //menyimpan perubahan dari form update
Route::delete('/artikel/{id}', 'ArtikelController@destroy'); //menghapus data dengan id