<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function(){

    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/login','Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout','Admin\AdminLoginController@logout')->name('admin.logout');
    Route::post('/password/email','Admin\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Admin\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Admin\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}','Admin\AdminResetPasswordController@showResetForm')->name('admin.password.reset');  
    Route::get('/profile','Admin\AdminController@viewProfile')->name('admin.get.profile'); 
    Route::post('/update-profile','Admin\AdminController@updateProfile')->name('admin.profile.update');
    Route::get('/users','Admin\AdminController@viewUsers')->name('admin.users');    
    Route::any('/delete-user/{id}','Admin\AdminController@deleteUser')->name('admin.delete.user');
    Route::get('/add-event','Admin\EventController@addEvent')->name('admin.add.event');
    Route::post('/store-event','Admin\EventController@storeEvent')->name('admin.store.event');
    Route::get('/view-events','Admin\EventController@viewEvent')->name('admin.view.events');  
    Route::any('/delete-event/{id}','Admin\EventController@deleteEvent')->name('admin.delete.event');
    Route::get('/view-event-details/{id}','Admin\EventController@viewEventDetails')->name('admin.view.event');  
    Route::any('/edit-event/{id}','Admin\EventController@editEvent')->name('admin.edit.event'); 
    Route::any('/update-event/{id}','Admin\EventController@updateEvent')->name('admin.update.event');    
    Route::get('/change-password','Admin\AdminController@changePassword')->name('admin.changePassword');
    Route::post('/update-password','Admin\AdminController@updatePassword')->name('admin.updatePassword');        
    Route::any('/check-pswd','Admin\AdminController@checkPassword');
    Route::get('/site-settings','Admin\AdminController@siteSettings')->name('admin.siteSetting');
    Route::post('/update-site-settings','Admin\AdminController@updateSiteSettings')->name('admin.siteSetting.update');


});