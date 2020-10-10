<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

//search doctor 
Route::get('/searchDoctors','searchDoctorsController@index')->name('doctors.index');
Route::post('/search','searchDoctorsController@search');
//booking
Route::get('/book/{time}/{doctor}/{id}','searchDoctorsController@booking');
Route::post('/booking','searchDoctorsController@store_booking');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');



    //Doctor 
    //Route::resource('doctors', 'DoctorsController');
    Route::delete('doctors/destroy', 'DoctorsController@massDestroy')->name('doctors.massDestroy');
    Route::resource('doctors', 'DoctorsController');

    //booking
    Route::delete('doctors/destroy', 'DoctorsController@massDestroy')->name('booking.massDestroy');
    Route::resource('booking', 'bookingController');
});
