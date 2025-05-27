<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ReservationController;
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
Route::resource('reservations', ReservationController::class);

Route::get('/sendmail',function(){
    Mail::to('test@gmail.com')->send(new DemoMail());
    return "done";
});

Route::get('/factures/{facture}/download-pdf', [FactureController::class, 'download'])
    ->name('factures.download-pdf')->middleware('auth');
