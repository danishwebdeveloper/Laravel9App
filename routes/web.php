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

// for Users
Route::get('/users', [AdminController::class, 'users']);
Route::get('/deleteuser/{id}', [AdminController::class, 'delete']);

// Food Menu
Route::get('/foodmenu', [AdminController::class, 'foodmenu']);

// Uploadfood
// Route::post('/uploadfood', [AdminController::class, 'uploadfood']);

Route::post('/uploadfood', [AdminController::class, 'uploads'])->name('uploads-food');

Route::get('/showfood', [AdminController::class, 'show']);
Route::get('/deleteitem/{id}', [AdminController::class, 'deleteFood']);
Route::get('/viewfood/{id}', [AdminController::class, 'updateView']);
Route::post('/updatefood/{id}', [AdminController::class, 'updatefood'])->name('update-food');


// Table Reservation
Route::post('/reservation', [AdminController::class, 'reservation'])->name('reservation-table');
Route::get('/reservationView', [AdminController::class, 'reservationView']);
Route::get('/completed/{id}', [AdminController::class, 'completed']);


// Chefs
Route::get('/viewchefs', [AdminController::class, 'viewChefs']);
Route::post('/addchef', [AdminController::class, 'addChef'])->name('view-chef');
Route::get('/deletechef/{id}', [AdminController::class, 'deleteChef']);
Route::get('/updatechef/{id}', [AdminController::class, 'updateViewChef']);
Route::post('/update/{id}', [AdminController::class, 'updateChef'])->name('update-chef');

// Add to Cart
Route::post('/addtocart/{id}', [HomeController::class, 'addtoCart'])->name('add-to-cart');
Route::get('/showcart/{id}', [HomeController::class, 'showCart']);
Route::get('/deletecartitem/{id}', [HomeController::class, 'deleteCartItem']);
Route::post('/orderConfirm', [HomeController::class, 'orderConfirmation'])->name('order-confirmation');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
