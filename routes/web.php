<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\frontend\FrontendPageController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendPageController::class)->group(function () {
    Route::get('/', 'homePage')->name('home');
});

// Authentication controller
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginPage')->name('login');
    Route::post('/login', 'loginAction')->name('login.action');
    Route::get('/register', 'registerPage')->name('register');
    Route::post('/register', 'registerAction')->name('register.action');
    Route::put('/logout', 'logout')->name('logout');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});
