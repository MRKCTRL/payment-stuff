<?php

use App\Http\Controllers\contactController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testContoller;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/users',[testContoller::class, 'index']);
// Route::get('/contact', [contactController::class, 'index']);
// Route::get('/contact/store', [contactController::class, 'store']);

// Route::get('/users', function() {
//     return view('user.index');
// });

Route::get('/register/seek', [userController:: class, 'createSeeker']);