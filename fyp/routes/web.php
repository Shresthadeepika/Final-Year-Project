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

    // user info
    Route::get('/add_new_user','UserController@newUser')->name('addNewUser');
    Route::get('/showUserDetails','UserController@showUserDetails')->name('userDetails');
    Route::delete('/userDelete/{id}','UserController@userDestroy')->name('user.destroy');

    //for vehicle type
    Route::get('/add/newVehicleType','VehicleTypeController@newType')->name('newType');
    Route::post('/store/newVehicleType','VehicleTypeController@storeType')->name('storeType');
    Route::get('/show/vehicleType','VehicleTypeController@showType')->name('showType');
    Route::delete('/type/delete/{type_id}','VehicleTypeController@typeDestroy')->name('type.destroy');
    Route::get('/edit/type/{type_id}','VehicleTypeController@editType')->name('type.edit');
    Route::post('/update/type/{type_id}','VehicleTypeController@updateType')->name('type.update');

    //for vehicle info
    Route::get('/addNewVehicle','VehicleInfoController@new')->name('new.vehicle');
    Route::post('/storeNewVehicle','VehicleInfoController@store')->name('store.vehicle');
    Route::get('/showVehicle','VehicleInfoController@show')->name('show.vehicle');
    Route::delete('/vehicle/delete/{vehicle_id}','VehicleInfoController@vehicleDestroy')->name('vehicle.destroy');
    Route::get('/edit/vehicle/{vehicle_id}','VehicleInfoController@edit')->name('vehicle.edit');
    Route::post('/update/vehicle/{vehicle_id}','VehicleInfoController@update')->name('vehicle.update');

    //for rented vehicle
    Route::get('/show/Rentedvehicle','RentVehicleController@show')->name('show.rent');
    Route::delete('/Rentedvehicle/delete/{vehicle_id}','RentVehicleController@rentedVehicleDestroy')->name('rent.destroy');
    Route::get('/edit/Rentedvehicle/{vehicle_id}','RentVehicleController@edit')->name('rent.edit');
    Route::post('/update/Rentedvehicle/{vehicle_id}','RentVehicleController@update')->name('rent.update');

    //for listed vehicle
    Route::get('/show/Listedvehicle','ListVehicleController@show')->name('show.list');
    Route::delete('/Listedvehicle/delete/{vehicle_id}','ListVehicleController@listedVehicleDestroy')->name('list.destroy');
    // Route::get('/edit/Listedvehicle/{vehicle_id}','ListVehicleController@edit')->name('list.edit');
    // Route::post('/update/Listedvehicle/{vehicle_id}','ListVehicleController@update')->name('list.update');
    
});