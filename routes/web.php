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
});

*/
/*Route::get('/login', function () {
    return view('Admin/admin_login');
});*/
Route::get('/admin', function () {
    return view('Admin/home');
});
Route::get('/teacher', function () {
    return view('Admin/teacher');
});
Route::get('/student', function () {
    return view('Admin/student');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('register', 'Auth\RegisterController@registerusers');
Route::get('/logout', 'Auth\LoginController@logout');

/*Route::group(['middleware' => 'prevent-back-history'],function(){
    Auth::routes();
   Route::get('/login', function () {
    return view('Auth/login');
});
});*/
