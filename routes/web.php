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

Route::get('/user','userController@index');

Route::prefix('/student')->group(function(){
    Route::get('/add','studentController@add');
    Route::get('/index','studentController@index');
    Route::post('/do_add','studentController@do_add');
    Route::get('/edit/{id}','studentController@edit');
    Route::get('/del/{id}','studentController@del');
    Route::post('/update','studentController@update');
});


