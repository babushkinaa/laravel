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
    return view('welcome');
});

Route::get('/gallery', 'ImageController@index')->name('gallery');
Route::get('/gallery/{id}', 'ImageController@showIndexCategory');
Route::get('/show/{id}', 'ImageController@show');
Route::get('/edit/{id}', 'ImageController@edit');
Route::post('/update', 'ImageController@update');
Route::get('/add', 'ImageController@add');
Route::post('/add', 'ImageController@create');
Route::get('/del/{id}', 'ImageController@delete');
Route::get('/test', 'ImageController@test');
Route::get('/c', 'ImageController@c');


Route::get('/signup', array('as'=>'reg', function () {
    return view('signup');
}));

Route::get('/login', array('as'=>'enter', function () {
    return view('login');
}));



