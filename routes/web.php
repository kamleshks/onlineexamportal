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
Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('/', function () {
    return view('auth.login');
});
/*Route::get('/admin', function () {
    return view('Admin.home');
});*/
/*Route::get('/teacher', function () {
    return view('Admin.teacher');
});*/
Route::get('/student', function () {
    return view('Admin.student');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('register', 'Auth\RegisterController@registerusers');
//Route::get('/logout', 'Auth\LoginController@logout');


 
 Route::get('/logout', 'HomeController@index1');

});
Route::get('/teacher', 'adminController@Teacher');
Route::get('/admin', 'adminController@Admin');

Route::post('/readTeacher', 'adminController@readAdminData');
Route::post('/readStudent', 'adminController@readStudentData');
Route::post('/readquestions', 'adminController@readQuestion');


Route::get('/readAdmin', 'adminController@readAdminData');
Route::get('/activate','VerifyUserController@activeUser');
Route::post('/activate','VerifyUserController@activeUser');
Route::get('/deactivate','VerifyUserController@deactiveUser');
Route::post('/deactivate','VerifyUserController@deactiveUser');
Route::post('/importquestion','adminController@import');
Route::get('/getstudentname','adminController@getstudentname');






