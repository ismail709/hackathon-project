<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
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
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('reservations', ReservationController::class);
    Route::fallback(function () {
        return redirect('/');
    });
});



Route::get('/sendmail', function () {
    Mail::to('test@gmail.com')->send(new DemoMail());
    return "done";
});


Route::get('/location', function () {
    return view('location.index');
})->name('location');

Route::get('/location-details', function () {
    return view('location.location-details');
})->name('location-details');

Route::get('/location-reservation-calendar', function () {
    return view('location.location-reservation-calendar');
})->name('location-reservation-calendar');

Route::get('/user-dashboard-profile', function () {
    return view('user-dashboard.user-profile');
})->name('user-dashboard-profile');

Route::get('/user-dashboard-reservations', function () {
    return view('user-dashboard.user-reservations');
})->name('user-dashboard-reservations');

Route::get('/user-dashboard-invoices', function () {
    return view('user-dashboard.user-invoices');
})->name('user-dashboard-invoices');