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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@home')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::any('/register-event/{id}','HomeController@registerEvent')->name('register.event'); 
Route::any('/save-registration-type','HomeController@saveRegType')->name('save.registration.type'); 
Route::any('/save-personal-info','HomeController@savePersonalInfo')->name('save.personal.info'); 
Route::any('/save-team-info','HomeController@saveTeamInfo')->name('save.team.info');
Route::any('/save-waiver','HomeController@saveWaiver')->name('save.waiver'); 
Route::any('/save-billing-info','HomeController@saveBillingInfo')->name('save.billing.info'); 
Route::any('/submit-final-form','HomeController@submitFinalForm')->name('submit.final.form'); 
Route::any('/event-details/{id}','HomeController@eventDetails')->name('event.details'); 
Route::any('/check-email-exists','HomeController@checkEmail')->name('input.email.check'); 
Route::any('/event-leaderboard/{id}','HomeController@eventLeaderboard')->name('input.email.check');
Route::any('/athlete-events','HomeController@myEvents')->name('athlete.events'); 
Route::post('/user/logout','Auth\LoginController@userLogout')->name('user.logout');


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
    Route::any('/add-user','Admin\AdminController@addUser')->name('admin.add.user'); 
    Route::any('/delete-user/{id}','Admin\AdminController@deleteUser')->name('admin.delete.user');
    Route::any('/edit-user/{id}','Admin\AdminController@editUser')->name('admin.edit.user'); 
    Route::any('/update-user/{id}','Admin\AdminController@updateUser')->name('admin.update.user');    
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
    Route::any('/add-event-category','Admin\EventController@addCategory')->name('admin.add.category');
    Route::any('/edit-event-category/{id}','Admin\EventController@editEventCategory')->name('admin.edit.eventCategory'); 
    Route::any('/update-event-category/{id}','Admin\EventController@updateEventCategory')->name('admin.update.eventCategory');    
    Route::get('/view-event-category','Admin\EventController@viewCategory')->name('admin.view.category');
    Route::any('/delete-event-category/{id}','Admin\EventController@deleteEventCategory')->name('admin.eventCategory.delete');
    Route::get('/view-cms','Admin\CmsController@viewCms')->name('admin.view.cms');
    Route::any('/edit-cms/{id}','Admin\CmsController@editCms')->name('admin.edit.cms'); 
    Route::any('/add-registration-types/{id}','Admin\EventController@addRegistrationTypes')->name('admin.add.regtypes'); 
    Route::any('/add-event-divisions/{id}','Admin\EventController@addEventDivisions')->name('admin.add.divisions'); 

});