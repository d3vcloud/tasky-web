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

Route::bind('project',function($id){
	return App\Project::where('id',$id)->first();
});

Route::bind('task',function($id){
	return App\Task::where('id',$id)->first();
});


Route::get('/','BoardController@index')->name('app.board');

Route::get('login','Auth\AutenticacionController@showLoginForm')->name('app.login.form');
Route::post('login','Auth\AutenticacionController@login')->name('app.login.submit');
Route::post('logout','Auth\AutenticacionController@logout')->name('app.logout');

//Route::get('/','DashboardController@index')->name('app.dashboard');

Route::get('/register','Auth\RegisterController@registerForm')->name('app.register');
Route::post('/register','Auth\RegisterController@create')->name('app.register.submit');
Route::get('/forgotpwd','Auth\ForgotPasswordController@forgotForm')->name('app.forgotpwd');

Route::post('/project/save','ProjectController@store')->name('app.store.project');
Route::get('/project/list','ProjectController@getAll')->name('app.list.project');
Route::get('/project/delete/{project}','ProjectController@destroy')
    ->name('app.delete.project');
Route::get('/project/detail/{project}','ProjectDetailController@index')
    ->name('app.project.detail');

Route::post('/task/save','TaskController@store')->name('app.store.task');
Route::post('/task/update','TaskController@update')->name('app.update.task');
Route::get('/task/delete/{task}','TaskController@destroy')->name('app.delete.task');
Route::get('/task/detail/{task}','TaskController@getDetails')->name('app.details.task');
Route::post('/task/attachment','TaskAttachmentController@upload')
    ->name('app.upload.attachments.task');

Route::post('/subtask/save','TaskSubTaskController@store')->name('app.store.subtask');
Route::get('/subtask/delete/{id}','TaskSubTaskController@destroy')
    ->name('app.delete.subtask');
Route::post('/subtask/update','TaskSubTaskController@update')
    ->name('app.update.subtask');
//Route::get('/home', 'HomeController@index')->name('home');
