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
Route::get('/deletecompany{id}','CompanyController@delete_company'); // delete company
Route::get('/editcompany{id}','CompanyController@edit_page');         // edit company
Route::post('/insert_company','CompanyController@insert_company');
Route::post('//update_company{id}','CompanyController@update_company');



// job Backend
Route::get('/list_job','JobController@job_list');               // Danh sách job
Route::get('/job_new','JobController@job_new');                 // Danh sách job mới
Route::get('/confirm_job{id}','JobController@confirm_job');    // Xác nhận job
Route::get('//view_detailjob{id}','JobController@view_job'); // Xem chi tiết job
// home page


//login customer
Route::get('/login_customer','HomeController@login_customer');
Route::get('/register_customer','HomeController@register_customer');
Route::post('/user_login','CustomerController@login');
Route::post('/add_user','CustomerController@add_user');
Route::get('/logout_customer','HomeController@logout');
Route::get('/profile','CustomerController@profile');

//register customer

//job browser
Route::get('/job_browser','JobController@job_browser');
Route::get('/job_detail','JobController@job_detail');
Route::get('/detail_job{id}','JobController@detail_job');

//page company
Route::get('/company','CompanyController@frontend_company');

//contact page
Route::get('/contact','HomeController@contact_page');
Route::get('/test_profile','AdminController@profile');

// Nhà tuyển dụng

Route::get('/list_jobpost','RecruiterController@list_jobpost');   // list bài đã đăng 
