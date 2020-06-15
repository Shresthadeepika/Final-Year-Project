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

Route::get('/login', function () {
            return view('auth.login');
        })->name('login');
Route::get('/register', function () {
            return view('auth.register');
        })->name('register');
Route::get('/home',function(){
    return view('home');
});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//Admin routes

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => ['auth','checkAdminMiddleware']], function () {
    Route::get('/dashboard','AdminController@index')->name('dashboard');

    // user info
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
    // Route::delete('/Listedvehicle/delete/{vehicle_id}','ListVehicleController@listedVehicleDestroy')->name('list.destroy');
    Route::get('/edit/Listedvehicle/{vehicle_id}','ListVehicleController@edit')->name('list.edit');
    Route::post('/update/Listedvehicle/{vehicle_id}','ListVehicleController@update')->name('list.update');
    
});

Route::group(['prefix' => 'user', 'as' => 'user.','middleware' => ['auth','checkUserMiddleware']], function () {
    Route::get('/dashboard', 'UserController@userDashboard')->name('dashboard');
    Route::get('/vehicle/details{vehicle_id}','UserController@details')->name('vehicle.details');
    Route::get('/vehicleList','UserController@vehicleList')->name('list.vehicles');

    // Profile
    Route::get('/profile', 'ProfileController@profile')->name('profile');
    Route::get('/editProfile','ProfileController@editProfile')->name('edit.profile');
    Route::post('/update/user','ProfileController@updateProfile')->name('profile.update');

    // Listed vehicle
    Route::get('/listed/vehicle','UserListOutController@viewListed')->name('view.listed');
    Route::get('/add/listed','UserListOutController@addNew')->name('add.listed');
    Route::post('/store/listed','UserListOutController@storeListed')->name('store.listed');
    Route::delete('/delete/listed{vehicle_id}','UserListOutController@destroy')->name('destroy.listed');
    Route::get('/edit/listed{vehicle_id}','UserListOutController@edit')->name('edit.listed');
    Route::post('/update/listed{vehicle_id}','UserListOutController@update')->name('update.listed');
    Route::get('/return/vehicle{vehicle_id}','UserListOutController@return')->name('return.vehicle');

    //rent vehicle
    Route::get('/rent/vehicle{vehicle_id}','UserRentController@rentForm')->name('rent.form');
    Route::post('/store/rent{vehicle_id}','UserRentController@vehicleRent')->name('store.rent');
    Route::get('/show/rent/vehicle','UserRentController@show')->name('show.rent');
    // Route::delete('/delete/rented{vehicle_id}','UserRentController@destroy')->name('destroy.rented');

    //rent request
    Route::get('/show/rent/requests','RentRequestController@show')->name('show.request');
    Route::get('/rent/approve/{id}','RentRequestController@approve')->name('rent.approve');
    Route::get('/rent/reject/{id}','RentRequestController@reject')->name('rent.reject');
});