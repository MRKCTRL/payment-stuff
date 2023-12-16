<?php

use App\Http\Controllers\contactController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testContoller;
use App\Http\Controllers\userController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/register/seek', [userController:: class, 'createSeeker'])->name('create.seeker');
Route::post('/register/seek', [userController:: class, 'storeSeeker'])->name('store.seeker');

Route::get('/login', [userController::class, 'login'])->name('login');
Route::post('/login', [userController::class,'postLogin'])->name('login.post');


Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

