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
Route::get('/canceljob{id}','AdminController@cancelJob');  // Hủy xác nhận bài viết
Route::get('/deleteuser{id}','AdminController@deleteUser');  // Xóa người dùng

//phân quyền
Route::get('/listuser','AdminController@list_user');
//Company backend
Route::get('/listcompany','CompanyController@list_company');
Route::get('/addcompany','CompanyController@add_company');
Route::get('/deletecompany{id}','CompanyController@delete_company'); // delete company
Route::get('/editcompany{id}','CompanyController@edit_page');         // edit company
Route::post('/insert_company','CompanyController@insert_company');
Route::post('//update_company{id}','CompanyController@update_company');


//Quản lý ngành nghề backend
Route::get('/list_category','CategoryController@list_category'); 
Route::get('//deletecategory{id}','CategoryController@delete_category'); 
Route::get('/editcategory{id}','CategoryController@edit_category'); 
Route::post('/update_category{id}','CategoryController@update_category');
Route::get('/new_category','CategoryController@new_category_page');
Route::post('/add_category','CategoryController@add_category');

//Quản lý hình thức làm việc backend


// job Backend
Route::get('/list_job','JobController@job_list');               // Danh sách job
Route::get('/job_new','JobController@job_new');                 // Danh sách job mới
Route::get('/confirm_job{id}','JobController@confirm_job');    // Xác nhận job
Route::get('//view_detailjob{id}','JobController@view_job'); // Xem chi tiết job


//login customer
Route::get('/login_customer','HomeController@login_customer');
Route::get('/register_customer','HomeController@register_customer');
Route::post('/user_login','CustomerController@login');
Route::post('/add_user','CustomerController@add_user');
Route::get('/logout_customer','HomeController@logout');
Route::get('/profile','CustomerController@profile');
Route::get('/login_facebook','CustomerController@loginFacebook');
Route::get('/login_customer/callback','CustomerController@callbackFacebook');
Route::get('/forget_password','CustomerController@forgetPassword'); // Quên mật khẩu

//register customer

Route::get('/candidates','HomeController@candidate_page');
Route::get('/ui_list_candidate','AdminController@ui_list_candidate');

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
Route::get('/list_candidate{id}','RecruiterController@list_candidate');   // Xem danh sách ứng viên
Route::post('/viewprofile{id}','RecruiterController@view_profile');   // Xem profile ứng viên
Route::get('/add_job','RecruiterController@page_addjob');   // Trang thêm bài tuyển dụng
Route::post('/insert_job','RecruiterController@add_job');   // thêm bài tuyển dụng 
Route::get('/statistic','RecruiterController@showPageStatistic');   // báo cáo thống kê
Route::get('/filterstatic','RecruiterController@getStaticticByYear');   // Lọc theo năm
Route::get('/register_recuiter','RecruiterController@showRegisterPage');   // Trang đăng ký
Route::post('/save_recuiter','RecruiterController@saveRecuiter');   // Thêm tài khoản nhà tuyển dụng
Route::get('/deletepost{id}','RecruiterController@deletePost');   // xóa tin tuyển dụng




Route::post('/save_profile','CustomerController@save_profile');   // tạo hồ sơ cá nhân

// Ứng tuyển
Route::get('/login_user','CustomerController@login_after_apply');
Route::get('/apply_job{id_job}','CustomerController@apply_job');



Route::post('/save_profile{id}','CustomerController@save_profile');


//page Chi tiết công viêc
Route::get('/addtofavourite','CustomerController@addJobToFavourite');
Route::get('/searchjob','JobController@searchJob');


// công việc yêu thích
Route::get('/favourite','HomeController@showFavouritePage');
Route::get('/deletejobfavorite{id}','CustomerController@deleteJobFavorite'); // xóa công việc khỏi yêu thích


//category page
Route::get('/categorywork{id}','CategoryController@getJobByCategory');
Route::get('/citywork{id}','DistributionController@getJobByCity');

// 
Route::get('/test','DistributionController@test');

//company page
Route::get('/detail-company{id}','CompanyController@showDetailCompany');
Route::get('/searchcompany','CompanyController@searchCompany');

// Trang about us
Route::get('/aboutus','HomeController@showAboutusPage');


