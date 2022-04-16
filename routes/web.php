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

// Delete User
Route::get('/deleteuser/{id}', [AdminController::class, 'delete']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});