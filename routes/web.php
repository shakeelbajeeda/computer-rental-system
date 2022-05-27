<?php

use backend\ServiceController;
use backend\UserController;
use backend\AccountController;
use Illuminate\Support\Facades\Route;



Route::get('/logout', function(){
   auth()->logout();
  return redirect('/login');
})->name('logout');



Route::get('dashboard', 'backend\HomeController@index')->name('dashboard');
Route::post('/change_status', 'backend\HomeController@change_status')->name('change_status');
Route::get('home', 'backend\HomeController@index')->name('home');
Route::get('supper_admin_dashboard', 'backend\HomeController@index')->name('supper_admin_dashboard');
Route::post('/general_delete', 'backend\HomeController@general_delete')->name('general_delete');

// new routes starts here
Auth::routes();

Route::get('/', 'HomeController@index')->name('home_page');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/edit-profile', 'ProfileController@edit_profile')->name('edit_profile');
Route::post('/update-profile', 'ProfileController@update_profile')->name('update_profile');


Route::resources([
	'users' => UserController::class,
	'products' => ServiceController::class,
	'recharges' => AccountController::class,
]);

Route::get('all-rental-services', 'backend\ServiceController@all_rental_services')->name('all_rental_services');
Route::get('rent-requests', 'backend\ServiceController@rent_requests')->name('rent_requests');
Route::get('rent-return-requests', 'backend\ServiceController@rent_return_requests')->name('rent_return_requests');
Route::post('approve_request', 'backend\ServiceController@approve_request')->name('approve_request');
Route::post('return_confirm', 'backend\ServiceController@return_confirm')->name('return_confirm');



Route::post('update_service/{id}', 'backend\ServiceController@update')->name('update_service');
Route::get('view-all-staff', 'backend\UserController@staff')->name('view_all_staff');
Route::get('view-all-managers', 'backend\UserController@web_managers')->name('web_managers');


Route::get('user/dashboard', 'user\HomeController@index')->name('user_dashboard');
Route::get('user/my-recharge-history', 'user\HomeController@my_recharge_history')->name('my_recharge_history');
Route::get('/checkout/{id?}', 'HomeController@checkout')->name('checkout_page')->middleware('auth');
Route::post('/confirm-order', 'CheckoutController@confirm_order')->name('confirm_order')->middleware('auth');
Route::get('user/my-rented-devices', 'user\HomeController@my_rented_devices')->name('my_rented_devices');
Route::post('user/return-request', 'user\HomeController@send_return_request')->name('send_return_request');


Route::get('/service-detail/{id?}', 'HomeController@single')->name('single');




Route::get('profile', 'HomeController@profile')->name('supper_admin.profile');
Route::post('profile', 'HomeController@updateProfile')->name('save.profile');
