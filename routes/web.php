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
//     return view('dashboard');
// });

Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::resource('makes','MakeController');
    // Route::get('makes/{id}','MakeController@destroy');
    Route::resource('models','TypeController');
    Route::resource('garages','GarageController');
    Route::resource('fleets','AssetController');
    // Route::resource('documents','DocumentController');
    Route::resource('rentals','RentalController');
});


Route::middleware(['auth'])->group( function(){
	//all the routes here will require middleware authentication
	Route::resource('reservation','ReservationController');
	Route::resource('requests','RequestController');
    
    Route::resource('profile','ProfileController');

	// Route::get('/profile', function () {
 //    return view('account.profile');
// });

});

Route::get('/', function () {
    return view('reservation.landing');
    });

// Route::get('/rates', function () {
//     return view('rates');
//     });

Route::resource('rates','RateController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
