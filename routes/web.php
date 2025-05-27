<?php

use App\Http\Controllers\AuthController;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register',[AuthController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/sendmail',function(){
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