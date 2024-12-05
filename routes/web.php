<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\ProfileController;

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

// Middleware untuk pengguna yang sudah login
Route::middleware(['auth:web'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/consultation', function () {
        return view('consul');
    })->name('consul');


    Route::get('/userprofile', function () {
        return view('user');
    })->name('profile');

    // routes/web.php


    Route::get('/profile', function () {
    return view('user');
    })->middleware('auth');

    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');



    Route::post('/send-email', [EmailController::class, 'send'])->name('send.email');

    Route::get('/doctor', [DoctorController::class, 'publicIndex'])->name('doctor');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Rute untuk menyimpan booking
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/medicine', [MedicineController::class, 'publicIndex'])->name('public.medicine');

    Route::post('/buy-medicine', [MedicineController::class, 'buyMedicine'])->name('buyMedicine');

    Route::get('/antrian', [AntrianController::class, 'create'])->name('antrian.create');
    Route::post('/antrian/store', [AntrianController::class, 'store'])->name('antrian.store');

});

// Rute untuk pengguna yang belum login (guest)
Route::middleware(['guest:web'])->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Rute untuk admin yang belum login (guest:admin)
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
    Route::post('/admin/login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Middleware untuk admin yang sudah login
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    Route::post('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
    Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

    // Rute untuk CRUD dokter
    Route::get('/admin/doctors', [DoctorController::class, 'adminIndex'])->name('admin.doctors');
    Route::post('/admin/doctors/', [DoctorController::class, 'store'])->name('admin.storeDoctor');
    Route::put('/admin/doctors/{id}', [DoctorController::class, 'update'])->name('admin.updateDoctor');
    Route::delete('/admin/doctors/{id}', [DoctorController::class, 'destroy'])->name('admin.deleteDoctor');

    Route::get('/admin/medicines', [MedicineController::class, 'adminIndex'])->name('admin.medicines');
    Route::post('/admin/medicines', [MedicineController::class, 'store'])->name('admin.storeMedicine');
    Route::put('/admin/medicines/{id}', [MedicineController::class, 'update'])->name('admin.updateMedicine');
    Route::delete('/admin/medicines/{id}', [MedicineController::class, 'destroy'])->name('admin.deleteMedicine');

    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.bookings');
    Route::delete('/admin/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    Route::get('/admin/antrians', [AntrianController::class, 'index'])->name('admin.antrians');
    Route::delete('/admin/antrians/{id}', [AntrianController::class, 'destroy'])->name('antrians.destroy');

});

