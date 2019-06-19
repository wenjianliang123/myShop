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

//登录中间件
Route::middleware(['login'])->group(function(){
    Route::get('/','indexController@index');//首页 列表页面
});

//商品修改限制时间中间件
Route::middleware(['limit_time_edit_goods'])->group(function(){
    Route::any('/goods/edit/{goods_id}','Admin\goods_controller@edit');//商品 修改页面
});

//学生增删改查搜索分页redis缓存
Route::prefix('/student')->group(function(){
    Route::get('/add','studentController@add');
    Route::post('/do_add','studentController@do_add');
    Route::get('/edit/{id}','studentController@edit');
    Route::get('/del/{id}','studentController@del');
    Route::post('/update','studentController@update');
});

//注册登录
Route::post('/register','Login@register');
Route::get('/do_register','Login@do_register');

Route::get('/login','Login@login');
Route::get('/do_login','Login@do_login');
Route::get('/login_out','Login@login_out');


//商品图片上传
Route::get('/add_goods','Admin\goodsController@add_goods');
Route::post('/do_add_goods','Admin\goodsController@do_add_goods');

//商品增删改查分页搜索redis图片上传
Route::prefix('/goods')->group(function(){
    Route::get('/index','Admin\goods_controller@index');
    Route::get('add','Admin\goods_controller@add');
    Route::post('/do_add','Admin\goods_controller@do_add');
    Route::any('/update','Admin\goods_controller@update');
    Route::get('/del/{goods_id}','Admin\goods_controller@del');
});

//也是商品增删改查
Route::prefix('/goods_curd')->group(function(){
    Route::get('/index','Admin\controller_goods@index');
    Route::get('add','Admin\controller_goods@add');
    Route::post('/do_add','Admin\controller_goods@do_add');
    Route::any('/update','Admin\controller_goods@update');
    Route::get('/edit/{id}','Admin\controller_goods@edit');//商品 修改页面
    Route::get('/del/{id}','Admin\controller_goods@del');
});





