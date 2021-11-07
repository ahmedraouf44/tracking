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



//Route::get('/phpfirebase_sdk/{id?}','FirebaseController@index');


Auth::routes();
Route::get('/',  function () {
    return view('home.index');});
Route::get('/home',  function () {
    return view('home.index');
})->name('home');

Route::group(['middleware' => 'auth'], function () {
//    Route::resource('users', 'UsersController',['middleware' => 'role:admin|client']);
    Route::get('/orders', 'OrderController@index',['middleware' => 'admin|client'])->name('orders');
    Route::get('/orderTracking/{id}', 'OrderController@tracking',['middleware' => 'admin|client'])->name('orderTracking');
    Route::get('/trackingData/{id}', 'FirebaseController@trackingData',['middleware' => 'admin|client'])->name('trackingData');

    Route::get('/createOrder', 'OrderController@create',['middleware' => 'admin|client'])->name('createOrder');
    Route::post('/storeOrder', 'OrderController@store',['middleware' => 'admin|client'])->name('storeOrder');
    Route::delete('/deleteOrder/{id}', 'OrderController@delete',['middleware' => 'admin|client'])->name('deleteOrder');

    Route::get('/updateLocation/{id}', 'OrderController@updateLocation',['middleware' => 'admin|client'])->name('updateLocation');
    Route::post('/updateLocation/{id}', 'FirebaseController@updateLocation',['middleware' => 'admin|client'])->name('storeLocation');


});

Route::get('/testmab',function(){
    return view('mab');
});
