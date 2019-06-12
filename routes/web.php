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

//学生列表中间件
Route::middleware(['stu'])->group(function(){
    Route::get('/student/index','studentController@index');//学生增删改查搜索分页redis 列表页面
});

//学生增删改查搜索分页redis缓存
Route::prefix('/student')->group(function(){
    Route::get('/add','studentController@add');
    Route::post('/do_add','studentController@do_add');
    Route::get('/edit/{id}','studentController@edit');
    Route::get('/del/{id}','studentController@del');
    Route::post('/update','studentController@update');
});

//登录
Route::get('/register','studentController@register');

