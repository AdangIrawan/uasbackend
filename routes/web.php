<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;

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
    return view('home');
})->middleware('auth');

Route::get('/consultation', function () {
    return view('consul');
})->name('consul')->middleware('auth');

Route::get('/booking', function () {
    return view('booking');
})->name('Book')->middleware('auth');

Route::get('/userprofile', function () {
    return view('user');
})->name('UP')->middleware('auth');

Route::post('/send-email', [App\Http\Controllers\EmailController::class, 'send'])->name('send.email');

Route::middleware(['auth'])->group(function () {
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');

    Route::get('/profile', function () {
        return view('user_profile');
    })->name('profile');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Auth Routes
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
