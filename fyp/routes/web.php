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

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => ['CheckAdminMiddleware']], function () {
    Route::get('/dashboard','AdminController@index')->name('adminDashboard');

    // user details display
    Route::get('/user','UserController@show')->name('userDetails');
    Route::delete('/userDelete/{id}','UserController@destroy')->name('user.destroy');

});