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

    return App\Project::find($id);
});

Route::bind('task',function($id){
    return App\Task::find($id);
});

Route::get('/','BoardController@index')->name('app.board');
Route::post('/timezone','BoardController@setTimeZone')->name('app.set.timezone');

Route::get('/login','Auth\AutenticacionController@showLoginForm')->name('app.login.form');
Route::post('/login','Auth\AutenticacionController@login')->name('app.login.submit');
Route::post('/logout','Auth\AutenticacionController@logout')->name('app.logout');

//register user
Route::get('/register','Auth\RegisterController@registerForm')->name('app.register');
Route::post('/register','Auth\RegisterController@create')->name('app.register.submit');


Route::prefix('project')->group(function(){
    Route::post('/save','ProjectController@store')->name('app.store.project');
    Route::get('/list','ProjectController@getAll')->name('app.list.project');
    Route::get('/delete/{project}','ProjectController@destroy')
        ->name('app.delete.project');
    Route::get('/detail/{project}','ProjectDetailController@index')
        ->name('app.project.detail');
    Route::post('/adduser','ProjectController@addUser')->name('app.adduser.project');
    Route::get('/getmembers/{id}','ProjectController@getFilterMembers')->name('app.getmembers.project');
});

Route::prefix('task')->group(function(){
    Route::post('/save','TaskController@store')->name('app.store.task');
    Route::post('/update','TaskController@update')->name('app.update.task');
    Route::get('/delete/{task}','TaskController@destroy')->name('app.delete.task');
    Route::get('/detail/{task}','TaskController@getDetails')->name('app.details.task');
    Route::post('/addmember','TaskController@addMember')->name('app.addmember.task');
    Route::post('/rmvmember','TaskController@removeMember')->name('app.rmvmember.task');
});

Route::prefix('subtask')->group(function(){
    Route::post('/save','TaskSubTaskController@store')->name('app.store.subtask');
    Route::get('/delete/{id}','TaskSubTaskController@destroy')
        ->name('app.delete.subtask');
    Route::post('/update','TaskSubTaskController@update')
        ->name('app.update.subtask');
});

Route::prefix('attachment')->group(function(){
    Route::get('/getall','TaskAttachmentController@getAll')
        ->name('app.getall.attachments');
    Route::post('/upload','TaskAttachmentController@upload')
        ->name('app.upload.attachments');
    Route::get('/removeall','TaskAttachmentController@removeAll')
        ->name('app.removeall.attachments');
    Route::get('/remove/{id}','TaskAttachmentController@remove')
        ->name('app.remove.attachments');
    Route::get('/download/{id}','TaskAttachmentController@download')
        ->name('app.download.attachments');
});

Route::post('/comment/save','TaskActivityController@store')->name('app.store.comment');

Route::post('/label/save','TaskLabelController@store')->name('app.store.label');

Route::post('/send','InviteController@send')->name('app.send.invitation');

Route::get('/accept/{token}', 'InviteController@accept')->name('app.accept.invitation');
Route::post('/newuser','InviteController@newUser')->name('app.new.user');

Route::post('/photo','UserController@uploadPhoto')->name('app.upload.photo.user');

//Reset passwords
Route::get('/password/reset/{token?}','Auth\ResetPasswordController@showResetForm')
    ->name('password.reset');
Route::post('/password/reset','Auth\ResetPasswordController@reset')
    ->name('app.reset.submit');
Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')
    ->name('password.email');
Route::get('/password/email','Auth\ForgotPasswordController@showLinkRequestForm')
    ->name('password.request');