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

/*Route::get('/', function () {
    return view('welcome');
});*/

// Route::get('/', 'IndexController@index');
Route::get('/test', 'TestController@test');

// Route::any('admin/login', 'Admin\LoginController@login');
Route::any('/', 'Admin\LoginController@login');

Route::group(['middleware'=>['admin.login'], 'prefix'=>'admin', 'namespace'=>'Admin'], function () {
    Route::get('quit', 'LoginController@quit');

    Route::get('homepage/console', 'HomepageController@console');

    Route::any('admins/adminList', 'AdminsController@adminList');
    Route::any('admins/adminAdd', 'AdminsController@adminAdd');
    Route::any('admins/adminDel/{id}', 'AdminsController@adminDel');


});


