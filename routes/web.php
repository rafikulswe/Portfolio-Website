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

// Route::get('/', function () {
//     return view('demo');
// });
Route::get('/', 'WebController@index')->name('');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('');
Route::get('/admin/index', 'AdminController@index')->name('');
Route::get('/admin/all-user', 'CustomerController@index')->name('all-user');
Route::get('/admin/add-user', 'CustomerController@create')->name('');
Route::post('/admin/user-insert', 'CustomerController@insert')->name('');
Route::get('/admin/user/softdelete/{customer_id}', 'CustomerController@softdelete1')->name('');
Route::get('/admin/user/edit/{customer_id}', 'CustomerController@edit')->name('');
Route::post('/admin/user/update/{customer_id}', 'CustomerController@update')->name('');
Route::get('/admin/user-view/{customer_id}', 'CustomerController@view')->name('');



Route::get('/admin/all-banner', 'BannerController@index')->name('');
Route::get('/admin/add-banner', 'BannerController@create')->name('');
Route::post('/admin/banner-insert', 'BannerController@insert')->name('');
Route::get('/admin/banner/softdelete/{id}', 'BannerController@softdelete1')->name('');


Route::get('/admin/all-about', 'AboutController@index')->name('');
Route::get('/admin/add-about', 'AboutController@create')->name('');
Route::post('/admin/about-insert', 'AboutController@insert')->name('');
Route::get('/admin/about/edit/{id}', 'AboutController@edit')->name('');
Route::post('/admin/about/update/{id}', 'AboutController@update')->name('');
Route::get('/admin/about/softdelete/{id}', 'AboutController@softdelete1')->name('');


Route::get('/admin/all-service', 'ServiceController@index')->name('');
Route::get('/admin/add-service', 'ServiceController@create')->name('');
Route::post('/admin/service-insert', 'ServiceController@insert')->name('');

Route::get('/admin/all-blog', 'BlogController@index')->name('');
Route::get('/admin/add-blog', 'BlogController@create')->name('');
Route::post('/admin/blog-insert', 'BlogController@insert')->name('');
Route::get('/admin/blog/edit/{id}', 'BlogController@edit')->name('');
Route::post('/admin/blog/update/{id}', 'BlogController@update')->name('');

Route::post('/contact', 'WebController@insert')->name('');


Route::get('/admin/all-sms', 'SmsController@index')->name('');
Route::get('/admin/sms-view/{id}', 'SmsController@view')->name('');
Route::get('/admin/sms/softdelete/{id}', 'SmsController@softdelete1')->name('');


Route::get('/admin/all-work-category', 'WorkcategoryController@index')->name('');
Route::get('/admin/add-work-category', 'WorkcategoryController@create')->name('');
Route::post('/admin/work-category-insert', 'WorkcategoryController@insert')->name('');
Route::get('/admin/edit-work-category/{category_id}', 'WorkcategoryController@edit')->name('');
Route::post('/admin/work-category/update/{category_id}', 'WorkcategoryController@update')->name('');


Route::get('/admin/all-work', 'WorkController@index')->name('');
Route::get('/admin/add-work', 'WorkController@create')->name('');
Route::post('/admin/work-insert', 'WorkController@insert')->name('');
Route::get('/admin/work/softdelete/{id}', 'WorkController@softdelete1')->name('');
