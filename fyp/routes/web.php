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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => ['auth','checkAdminMiddleware']], function () {
    Route::get('/dashboard','AdminController@index')->name('dashboard');

    // user login details 
    Route::get('/user','UserController@userShow')->name('user');
    Route::delete('/userDelete/{id}','UserController@userDestroy')->name('user.destroy');

    // user info
    Route::get('/add_new_user','UserController@newUser')->name('addNewUser');
    Route::get('/showUserDetails','UserController@showUserDetails')->name('userDetails');
});