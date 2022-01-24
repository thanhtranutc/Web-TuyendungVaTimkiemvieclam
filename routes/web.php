<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin','AdminController@index');

// admin
Route::get('/dashboard','AdminController@dashboard');
Route::post('/loginadmin','AdminController@login');
Route::get('/logoutadmin','AdminController@logout');
Route::post('/update_roles{admin_id}','AdminController@update_roles');

//phân quyền
Route::get('/listuser','AdminController@list_user');
//Company
Route::get('/listcompany','CompanyController@list_company');
Route::get('/addcompany','CompanyController@add_company');
Route::post('/insert_company','CompanyController@insert_company');