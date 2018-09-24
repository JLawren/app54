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
    return view('welcome', [
    	'name' => 'lawrence',
    ]);
});

Route::get('/about', function(){
	return view('about');
});

Route::get('/tasks', function(){
	$tasks = DB::table('tasks')->get();

	return view('tasks', compact('tasks'));
});

Route::get('/tasks/{task}', function($id){
	$tasks = DB::table('tasks')->find($id);

	dd($tasks);

	return view('tasks', compact('tasks'));
});

Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/create', 'BlogController@create')->name('blog.create');
Route::post('/blog/create', 'BlogController@create_post')->name('blog.create.post');
Route::get('/blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
Route::post('/blog/edit', 'BlogController@edit_post')->name('blog.edit.post');
Route::post('/blog/delete', 'BlogController@delete')->name('blog.delete');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function(){
	Route::get('/member', 'MembershipController@index')->name('member.index');
	Route::get('/member/create/{id?}', 'MembershipController@create')->name('member.create');
	Route::post('/member/create', 'MembershipController@create_post')->name('member.create.post');
	Route::post('/member/delete', 'MembershipController@delete')->name('member.delete');
	Route::get('/member/list', 'MembershipController@list')->name('member.list');
	// Route::get('/member/edit/{id}', 'BlogController@edit')->name('member.edit');
	// Route::post('/member/edit', 'BlogController@edit_post')->name('member.edit.post');

	Route::get('/attend', 'AttendanceController@index')->name('attend.index');
	Route::post('/attend/insert/}', 'AttendanceController@insert')->name('attend.insert');
	
});
