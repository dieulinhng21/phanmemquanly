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
Route::group(['namespace' => 'client'], function() {
    Route::resource('client/project','ProjectController');
    Route::resource('client/contract', 'ContractController');
    Route::resource('client/apartment','ApartmentController');
    Route::resource('client/flat','FlatController');
    Route::resource('client/location','LocationController');
    Route::resource('client/manager','ManagerController');
    // Route::resource('client/marketting','MarkettingController');
    Route::resource('client/customer','CustomerController');
});
// Route::group(['namespace' => 'viewer'], function() {
//     Route::get('viewer/project','ProjectController@in');
//     Route::get('viewer/contract', 'ContractController');
//     Route::get('viewer/apartment','ApartmentController');
    
//     Route::get('viewer/flat','FlatController');
//     // Route::resource('viewer/location','LocationController');
//     Route::get('viewer/manager','ManagerController');
//     // Route::resource('viewer/marketting','MarkettingController');
//     Route::get('viewer/customer','CustomerController');
// });
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');