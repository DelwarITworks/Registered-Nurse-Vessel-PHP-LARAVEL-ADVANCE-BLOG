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

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/locale/{locale}', function($locale){	
	Session::put('locale',$locale);
	return redirect()->back();
});


Route::get('/', 'HomeController@index')->name('/');
Route::get('/about', 'Front\PublicController@about')->name('about');
Route::get('/contact', 'Front\PublicController@contact')->name('contact');
Route::get('/store-contact', 'Front\PublicController@contactStore')->name('store.contact');
Route::get('/search', 'Front\PublicController@search')->name('search');
Route::get('/post/{slug}', 'Front\PublicController@singlePost')->name('post.single');
Route::get('/category/{postcate}', 'Front\PublicController@catePost')->name('category.post');
Auth::routes();



Route::get('/admin/profile','UserController@index')->name('user.profile');

Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/dashboard', 'HomeController@admin')->name('dashboard');
	Route::get('/admin', 'AdminController@admin')->name('admin');
	Route::get('/demote-admin/{admin}', 'AdminController@demoteAdmin')->name('demote.admin');

	//Userdetails
	Route::get('profile','AdminController@index');

	//Stafffs
	Route::get('/all_staff','StaffController@index')->name('all.staffs');
	Route::get('/add_staff','StaffController@create')->name('add.staff');
	Route::post('/add_staff','StaffController@store')->name('create.staff');
	Route::get('/edit_staff/{staff}','StaffController@edit')->name('edit.staff');
	Route::post('update_staff/{staff}','StaffController@update')->name('update.staff');
	Route::get('/delete_staff/{staff}','StaffController@destroy');

	//About
	Route::get('/add_about','Aboutcontroller@index')->name('all.about');
	Route::post('/store_about','Aboutcontroller@store')->name('store.about');
	Route::get('/edit_about','Aboutcontroller@edit')->name('edit.about');
	Route::post('/update_about','Aboutcontroller@update')->name('update.about');

	//setting
	Route::get('/setting','Settingcontroller@index')->name('setting');
	Route::post('/store_setting','Settingcontroller@store')->name('store.setting');
	Route::post('/update_setting','Settingcontroller@update')->name('update.setting');

    //BLOG POST CATEGORY ROUTE ARE HERE
    Route::get('/category-list', 'PostcategoryController@index')->name('all.categories');
    Route::post('/store-category', 'PostcategoryController@store')->name('store.category');
    Route::get('/edit-category/{category}', 'PostcategoryController@edit')->name('edit.category');
    Route::post('/update-category/{category}','PostcategoryController@update')->name('update.category');
    Route::get('/active-category/{category}','PostcategoryController@active')->name('active.category');
    Route::get('/deactive-category/{category}','PostcategoryController@deactive')->name('deactive.category');
    Route::get('/delete-category/{category}','PostcategoryController@delete')->name('delete.category');


	//Post
	Route::get('/all_post','PostController@index')->name('all.posts');
	Route::get('/add_post','PostController@create')->name('add.post');
	Route::post('/add_post','PostController@store')->name('create.post');
	Route::get('/edit_post/{post}','PostController@edit')->name('edit.post');
	Route::post('/update_post/{post}','PostController@update')->name('update.post');
	Route::get('/delete_post/{post}','PostController@destroy');


	//Slider
	Route::get('/all_slider','SliderController@index')->name('all.sliders');
	Route::get('/add_slider','SliderController@create')->name('add.slider');
	Route::post('/add_slider','SliderController@store')->name('create.slider');
	Route::get('/edit_slider/{slider}','SliderController@edit')->name('edit.slider');
	Route::post('/update_slider/{slider}','SliderController@update')->name('update.slider');
	Route::get('/delete_slider/{slider}','SliderController@destroy');
	Route::get('/active-slider/{slider}','SliderController@active')->name('active.slider');
    Route::get('/deactive-slider/{slider}','SliderController@deactive')->name('deactive.slider');


	//galary
	Route::get('/all_galary','GalaryController@index')->name('all.galaries');
	Route::get('/add_galary','GalaryController@create')->name('add.galary');
	Route::post('/add_galary','GalaryController@store')->name('create.galary');
	Route::get('/edit_galary/{galary}','GalaryController@edit')->name('edit.galary');
	Route::post('/update_galary/{galary}','GalaryController@update')->name('update.galary');
	Route::get('/delete_galary/{galary}','GalaryController@destroy');
	Route::get('/active-galary/{galary}','GalaryController@active')->name('active.galary');
    Route::get('/deactive-galary/{galary}','GalaryController@deactive')->name('deactive.galary');
});