<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\FrontendPageController;
use App\Http\Controllers\Backend\BackendPageController;
use App\Http\Controllers\backend\CarouselController;
use App\Http\Controllers\backend\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Frontend Routes
Route::controller(FrontendPageController::class)->group(function () {
    Route::get('/', 'homePage')->name('home');
    Route::get('/about', 'aboutPage')->name('about');
});

/*
|--------------------------------------------------------------------------
| 🔐 Authentication Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginPage')->name('login');
    Route::post('/login', 'loginAction')->name('login.action');
    Route::get('/register', 'registerPage')->name('register');
    Route::post('/register', 'registerAction')->name('register.action');
    Route::post('/logout', 'logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| 🛠️ Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->as('admin.')->middleware('rolemanager:admin')->group(function () {
    Route::controller(BackendPageController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/settings', 'settings')->name('settings');
        Route::put('/settings/update/{id}', [SettingController::class, 'update'])->name('settings.update');

        // carousel controller
        Route::resource('/carousel', CarouselController::class);
    });
});
