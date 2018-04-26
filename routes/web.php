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

//manage floors routes
Route::get('floors', 'FloorsController@index')->name('floors.index');
Route::get('getFloorsData', 'AjaxController@floorsDataAjax');
Route::get('floors/create', 'FloorsController@create');
Route::post('floors', 'FloorsController@store');
Route::get('floors/{id}/edit', 'FloorsController@edit');
Route::put('floors/{id}', 'FloorsController@update');
Route::delete('floors/{id}', 'FloorsController@destroy');


Route::get('clients', 'ClientsController@index');
Route::get('data', 'AjaxController@clientsData');
Route::get('clients/create', 'ClientsController@create');
Route::post('clients','ClientsController@store');
Route::get('clients/{id}/edit', 'ClientsController@edit');
Route::put('clients/{id}', 'ClientsController@update');
Route::delete('clients/{id}/delete', 'ClientsController@destroy');
Route::get('clients/{id}/approve','ClientsController@approve');



//manage reservations routes
Route::get('reservations', 'ReservationsController@index');
Route::get('reservationdata', 'AjaxController@reservationDataAjax');
Route::get('reservations/roomsdata', 'AjaxController@showRoomAjaxData');
Route::get('reservations/rooms', 'ReservationsController@show');
Route::get ('reservations/create/{room_id}','ReservationsController@create');
Route::post('reservations/{room_id}','ReservationsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




//UserController Routes
Route::get(
    '{role}',
    'UserController@index'
)->name('users.index')->where('role', 'managers|receptionists')->middleware('auth','role:admin|manager|receptionist','forbid-banned-user');
Route::get('getManagersData', 'AjaxController@managersDataAjax');
Route::get('getReceptionistsData', 'AjaxController@receptionistsDataAjax');
Route::get(
    '{role}/create',
    'UserController@create'
)->name('users.create')->where('role', 'managers|receptionists')->middleware('auth','role:admin|manager','forbid-banned-user');

Route::post(
    '{role}',
    'UserController@store'
)->name('users.store')->where('role', 'managers|receptionists');

Route::get(
    '{role}/{user}',
    'UserController@show'
)->name('users.show')->where('role', 'managers|receptionists')->middleware('auth','role:admin|manager','forbid-banned-user');

Route::get(
    '{role}/{user}/edit',
    'UserController@edit'
)->name('users.edit')->where('role', 'managers|receptionists')->middleware('auth','role:admin|manager','forbid-banned-user');

Route::put(
    '{role}/{user}',
    'UserController@update'
)->name('users.update')->where('role', 'managers|receptionists');

Route::delete(
    '{role}/{user}',
    'UserController@destroy'
)->name('users.destroy')->where('role', 'managers|receptionists');

Route::get(
    'ban/{user}',
    'UserController@ban'
)->name('users.ban');

Route::get(
    'unban/{user}',
    'UserController@unban'
)->name('users.unban');



//manage rooms routes
Route::get('rooms', 'RoomsController@index')->name('rooms.index');
Route::get('getRoomsData', 'AjaxController@roomsDataAjax');
Route::get('rooms/create', 'RoomsController@create');
Route::post('rooms', 'RoomsController@store');
Route::get('rooms/{id}/edit', 'RoomsController@edit');
Route::put('rooms/{id}', 'RoomsController@update');
Route::delete('rooms/{id}', 'RoomsController@destroy');





Route::group(['prefix' => 'client'], function () {
  Route::get('/login', 'ClientAuth\LoginController@showLoginForm')->name('clientlogin');
  Route::post('/login', 'ClientAuth\LoginController@login');
  Route::post('/logout', 'ClientAuth\LoginController@logout')->name('clientlogout');

  Route::get('/register', 'ClientAuth\RegisterController@showRegistrationForm')->name('clientregister');
  Route::post('/register', 'ClientAuth\RegisterController@register');

  Route::post('/password/email', 'ClientAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'ClientAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'ClientAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'ClientAuth\ResetPasswordController@showResetForm');
});
