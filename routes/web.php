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
    return view('landingpage');
});

Route::get('/nonmember', function () {
    return view('auth/nonmember');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('user')->group(function() {
	Route::get('/', function () {
		return view('auth/user');
	});
	Route::get('/login', function () {
		return view('auth/login');
	});
	Route::get('/register', function () {
		return view('auth/register');
	});
	
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function() {
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::resource('manageadmins', 'ManageAdminController');
	Route::resource('pemesanan', 'ManagePemesananController');
});

Route::get('/mesan', function() {
	return view('mesan');
});
Route::post('/pembayaran', 'PembayaranController@store')->name('pembayaran');

Route::get('/pembayaran', function() {
	return view('pembayaran');
});
Route::get('/welcome', function() {
	return view('welcome');
});