<?php

use App\Http\Controllers\contactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\postJobController;
use App\Http\Controllers\subscriptionController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testContoller;
use App\Http\Controllers\userController;
use App\Http\Middleware\isEmployer;
use App\Http\Middleware\isPremiumUser;
use Illuminate\Auth\Events\Logout;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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


 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/register/seek', [userController:: class, 'createSeeker'])->name('create.seeker');
Route::post('/register/seek', [userController:: class, 'storeSeeker'])->name('store.seeker');

Route::get('/register/employer', [userController:: class, 'createEmployer'])->name('create.employer');
Route::post('/register/employer', [userController:: class, 'storeEmployer'])->name('store.employer');

Route::get('/login', [userController::class, 'login'])->name('login');
Route::post('/login', [userController::class,'postLogin'])->name('login.post');


Route::post('/logout', [userController::class, 'logout'])->name('logout');

// Route::post('/dashboard', [DashboardController::class, 'index'])
// ->middleware('auth')
// ->name('dashboard');

Route::get('/dashboard', [DashboardController::class,'index'])
->middleware('verified')
->name('dashboard');
Route::get('resend/verificaction/email', [DashboardController::class, 'resend'])->name('resend.email'); 

Route::get('subscribe', [subscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('pay/weekly', [subscriptionController::class, 'initPayment'])->name('pay.weekly');
Route::get('pay/montlyy', [subscriptionController::class, 'initPayment'])->name('pay.monthly');
Route::get('pay/yearly', [subscriptionController::class, 'initPayment'])->name('pay.yearly');

Route::get('successful/payment', [subscriptionController::class, 'successfulPayment'])->name('successful.Payment');



Route::get('payment/cancellation', [subscriptionController::class, 'paymentCancellation'])->name('payment.cancellation');

Route::get('job/creation', [postJobController::class, 'creation'])->name('job.creation')->middleware(isPremiumUser::class);
