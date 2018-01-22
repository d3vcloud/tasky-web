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

Route::get('/','BoardController@index')->name('app.board');

Route::get('login','Auth\AutenticacionController@showLoginForm')->name('app.login.form');
Route::post('login','Auth\AutenticacionController@login')->name('app.login.submit');
Route::post('logout','Auth\AutenticacionController@logout')->name('app.logout');

//Route::get('/','DashboardController@index')->name('app.dashboard');

Route::get('/register','Auth\RegisterController@registerForm')->name('app.register');
Route::post('/register','Auth\RegisterController@create')->name('app.register.submit');
Route::get('/forgotpwd','Auth\ForgotPasswordController@forgotForm')->name('app.forgotpwd');

Route::post('/task/save','ProjectController@store')->name('app.store.project');
Route::get('/task/list','ProjectController@list')->name('app.list.project');

//Route::get('/home', 'HomeController@index')->name('home');
