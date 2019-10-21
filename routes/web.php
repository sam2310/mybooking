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

// use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route parameter
Route::get('/something/{name}/{company}', 'GreetingController@index');

//room route
Route::group(['middleware'=>'auth', 'prefix'=>'room' ,'as' => 'room:'], function() {
    Route::group(['middleware' =>'can:view,App\Room'],function(){
        Route::get('/add', 'RoomsController@add')->name('add');
        Route::post('/add', 'RoomsController@store')->name('store');
        Route::get('/', 'RoomsController@index')->name('index');
        Route::get('/search', 'RoomsController@search')->name('search');
    });

    Route::group(['middleware' => 'can:manage,room'], function() {
        Route::get('/{room}/delete', 'RoomsController@delete')->name('delete')->middleware('can:delete,room');
        Route::get('/{room}/edit', 'RoomsController@edit')->name('edit');
        Route::post('/{room}/update', 'RoomsController@update')->name('update');

    });
});


//Booking Routes
Route::group(['middleware'=>['auth','can:create,App\Booking'], 'prefix'=>'bookings', 'as'=> 'booking:'], function() {
    Route::get('/add', 'BookingsController@add')->name('add');
    Route::post('/store', 'BookingsController@store')->name('store');
    Route::get('/index', 'BookingsController@index')->name('index');

});


//testing
Route::get('bookings/pending','BookingsController@pending')->name('booking:pending');
Route::get('bookings/{approve}/approve', 'BookingsController@approve')->name('booking:approve');
Route::get('bookings/{reject}/reject', 'BookingsController@reject')->name('booking:reject');
