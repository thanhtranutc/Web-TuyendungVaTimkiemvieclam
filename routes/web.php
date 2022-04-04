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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/admin','AdminController@index');
Route::get('/','HomeController@index');

// admin
Route::get('/dashboard','AdminController@dashboard');
Route::post('/loginadmin','AdminController@login');
Route::get('/logoutadmin','AdminController@logout');
Route::post('/update_roles{admin_id}','AdminController@update_roles');

//phân quyền
Route::get('/listuser','AdminController@list_user');
//Company backend
Route::get('/listcompany','CompanyController@list_company');
Route::get('/addcompany','CompanyController@add_company');
Route::post('/insert_company','CompanyController@insert_company');
// home page


//login customer
Route::get('/login_customer','HomeController@login_customer');
Route::get('/register_customer','HomeController@register_customer');
Route::post('/user_login','CustomerController@login');
Route::post('/add_user','CustomerController@add_user');
Route::get('/logout_customer','HomeController@logout');

//register customer

//job browser
Route::get('/job_browser','JobController@job_browser');
Route::get('/job_detail','JobController@job_detail');

//page company
Route::get('/company','CompanyController@frontend_company');