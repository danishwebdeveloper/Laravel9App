<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index'])->name('home-controller');
Route::get('/redirectsroute', [HomeController::class, 'redirects']);

Route::get('/adminhome', [AdminController::class, 'index']);
// for users
Route::get('/users', [AdminController::class, 'users']);

// Food Menu
Route::get('/foodmenu', [AdminController::class, 'foodmenu']);

// Uploadfood
// Route::post('/uploadfood', [AdminController::class, 'uploadfood']);

Route::post('/uploadfood', [AdminController::class, 'uploads'])->name('uploads-food');

Route::get('/showfood', [AdminController::class, 'show']);
Route::get('/deleteitem/{id}', [AdminController::class, 'deleteFood']);
Route::get('/viewfood/{id}', [AdminController::class, 'updateView']);
Route::post('/updatefood/{id}', [AdminController::class, 'updatefood'])->name('update-food');

// Delete User
Route::get('/deleteuser/{id}', [AdminController::class, 'delete']);


// Table Reservation
Route::post('/reservation', [AdminController::class, 'reservation'])->name('reservation-table');
Route::get('/reservationView', [AdminController::class, 'reservationView']);
Route::get('/completed/{id}', [AdminController::class, 'completed']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
