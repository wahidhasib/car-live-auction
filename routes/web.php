<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\frontend\FrontendPageController;
use App\Http\Controllers\backend\BackendPageController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\CarouselController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CarController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\TestimonialController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Frontend Routes
Route::controller(FrontendPageController::class)->group(function () {
    Route::get('/', 'homePage')->name('home');
    Route::get('/about', 'aboutPage')->name('about');
    Route::get('/services', 'servicesPage')->name('services');
    Route::get('/services/{slug}', 'serviceDetails')->name('service.details');
    Route::get('/testimonials', 'testimonialsPage')->name('testimonials');
    Route::get('/contact', 'contactPage')->name('contact');
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
        // Brand controller
        Route::resource('/brand', BrandController::class);
        // Testimonial controller
        Route::resource('/testimonial', TestimonialController::class);
        // Category Controller
        Route::resource('/category', CategoryController::class);
        // Blog Controller
        Route::resource('/blog', BlogController::class);
        // Service controller
        Route::resource('/service', ServiceController::class);
        // Cars controller
        Route::resource('/car', CarController::class);
    });
});

Route::get('/optimize', function () {
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    Artisan::call('optimize');
    Artisan::call('storage:link');
    return "Configaration successfully!";
});
