<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {




    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::fallback(function () {
        return redirect()->route('login');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'location'])->name('location');
    Route::get('/location-details/{id}', [AuthController::class, 'locationDetails'])->name('location-details');
        // Route::get('/location-details/{id}', [AuthController::class, 'calendar'])->name('location-details');
    //     Route::get('/location-reservation-calendar', function () {
    //     return view('location.location-reservation-calendar');
    // })->name('location-reservation-calendar');
Route::get('/mon_espace', [UserDashboardController::class, 'profile'])->name('mon_espace');
Route::get('/invoices', [UserDashboardController::class, 'invoices'])->name('invoices');
Route::get('/reservations', [UserDashboardController::class, 'reservations'])->name('reservations');
Route::put('/update-profile', [UserController::class, 'update'])->name('profile.update');
Route::put('/update-password', [UserController::class, 'updatePassword'])->name('password.update');


    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::resource('reservations', ReservationController::class);
    Route::fallback(function () {
        return redirect('/');
    });
});



Route::get('/sendmail', function () {
    Mail::to('test@gmail.com')->send(new DemoMail());
    return "done";
});

Route::get('/factures/{facture}/download-pdf', [FactureController::class, 'download'])
    ->name('factures.download-pdf')->middleware('auth');
