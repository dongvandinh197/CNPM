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
// Route::get('/dashboard',function(){
// 	return view('admin.dashboard');
// });
Route::get('dong/{ten}',function($ten){
	 echo"Anh ".$ten." đẹp zai vl" ;
});
// Route::get('home-page',function(){
// 	return view('web.home');
// // })->name('home.index');

Auth::routes();

Route::get('/home-page', 'HomeController@index')->name('home');
Route::get('/dang-ki', 'HomeController@dang_ki')->name('dang_ki');
Route::post('/register', 'HomeController@register')->name('register');


Route::get('/pdf', 'HomeController@export_pdf')->name('home');

