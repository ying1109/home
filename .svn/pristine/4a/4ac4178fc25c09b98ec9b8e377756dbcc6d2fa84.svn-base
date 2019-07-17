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
Route::any('/login', 'Admin\LoginController@login');

Route::group(['middleware'=>['admin.login'], 'prefix'=>'admin', 'namespace'=>'Admin'], function () {
    Route::get('quit', 'LoginController@quit');

    Route::get('homepage/console', 'HomepageController@console');

    Route::any('admins/adminList', 'AdminsController@adminList');
    Route::any('admins/adminAdd', 'AdminsController@adminAdd');
    Route::any('admins/adminDel/{id}', 'AdminsController@adminDel');
    Route::any('admins/adminEdit/{id}', 'AdminsController@adminEdit');

    Route::any('admins/moduleList', 'AdminsController@moduleList');
    Route::any('admins/moduleAdd', 'AdminsController@moduleAdd');
    Route::any('admins/moduleDel/{id}', 'AdminsController@moduleDel');
    Route::any('admins/moduleEdit/{id}', 'AdminsController@moduleEdit');

    Route::any('admins/ruleList', 'AdminsController@ruleList');
    Route::any('admins/ruleAdd', 'AdminsController@ruleAdd');
    Route::any('admins/ruleDel/{id}', 'AdminsController@ruleDel');
    Route::any('admins/ruleEdit/{id}', 'AdminsController@ruleEdit');

    Route::any('admins/groupList', 'AdminsController@groupList');
    Route::any('admins/groupAdd', 'AdminsController@groupAdd');
    Route::any('admins/groupDel/{id}', 'AdminsController@groupDel');
    Route::any('admins/groupEdit/{id}', 'AdminsController@groupEdit');

    Route::any('admins/resetPwd', 'AdminsController@resetPwd');


});


