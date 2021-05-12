<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FlightController;

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
Route::get('/', [BookingController::class, 'index']);
// Route::post('/', [BookingController::class, 'store']);

Route::get('/search', [BookingController::class, 'addbook']);
Route::post('/search', [BookingController::class, 'addbook']);
// Route::post('/flightresult', [BookingController::class, 'getFlight']);
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'BookingController@index');
// Route::get('/', [FlightController::class, 'index']);
// Route::post('/', [FlightController::class, 'store']);

