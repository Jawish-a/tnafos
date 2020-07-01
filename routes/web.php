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

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('index');
Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard')->middleware('auth');

    Route::resource('company', 'CompanyController')->middleware('auth');
    Route::resource('user', 'UserController')->middleware('auth');
    Route::resource('service', 'ServiceController')->middleware('auth');
    Route::resource('settings', 'SettingsController')->middleware('auth');
    Route::resource('category', 'CategoryController')->middleware('auth');
    Route::get('purchase_request/incomming', 'PurchaseRequestController@incomming')->name('purchase_request.incomming')->middleware('auth');
    Route::get('purchase_request/outgoing', 'PurchaseRequestController@outgoing')->name('purchase_request.outgoing')->middleware('auth');
    Route::resource('purchase_request', 'PurchaseRequestController')->middleware('auth');
    Route::get('estimate/create/{uuid}', 'EstimateController@create')->name('estimate.create');
    Route::get('estimate/incomming', 'EstimateController@incomming')->name('estimate.incomming')->middleware('auth');
    Route::get('estimate/outgoing', 'EstimateController@outgoing')->name('estimate.outgoing')->middleware('auth');
    Route::get('estimate/setStatus/{uuid}', 'EstimateController@setStatus')->name('estimate.setStatus')->middleware('auth');
    Route::resource('estimate', 'EstimateController')->except('create')->middleware('auth');
});

Route::get('/search', 'HomeController@search')->name('search');
Route::get('/addToList/{id}', 'HomeController@addToList')->name('addToList');

Route::get('/list', 'HomeController@list')->name('list');
