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
use App\Http\Controllers\backend\ModelController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\frontend\CompareController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\frontend\WishListController;
use App\Models\Blog;
use App\Models\Car;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\Artisan;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Frontend Routes
Route::controller(FrontendPageController::class)->group(function () {
    Route::get('/', 'homePage')->name('home');
    Route::get('/load-models', 'getModels')->name('getModels');
    Route::get('/load-cars', 'loadCars')->name('loadCars');
    Route::get('/cars', 'carsPage')->name('cars');
    Route::get('/cars/{slug}', 'carDetails')->name('car.details');
    Route::get('/about', 'aboutPage')->name('about');
    Route::get('/services', 'servicesPage')->name('services');
    Route::get('/services/{slug}', 'serviceDetails')->name('service.details');
    Route::get('/testimonials', 'testimonialsPage')->name('testimonials');
    Route::get('/contact', 'contactPage')->name('contact');
    Route::get('/emi-calculator', 'calculatorPage')->name('calculator');
    Route::post('/calculate-emi', 'calculateEMI')->name('calculate');
    Route::get('/comming-soon', 'commingSoonPage')->name('commingsoon');
    Route::get('/blogs', 'blogsPage')->name('blogsPage');
    Route::get('/blogs/{slug}', 'singleBlog')->name('singleBlog');

    Route::get('/testimonials/{id}', 'happyClient')->name('happyClient');
});

Route::resource('reviews', ReviewController::class);

// Search controller
Route::controller(SearchController::class)->name('search.')->group(function () {
    Route::get('/search-ajax', 'headerSearch')->name('ajax');
    Route::get('/search-cars', 'filterCars')->name('filter');
});

// Compare controller 
Route::controller(CompareController::class)->prefix('compare')->name('compare.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/add', 'addToCompare')->name('add');
    Route::post('/remove', 'removeFromCompare')->name('remove');
    Route::get('/count', 'countCompareItems')->name('count');
});

Route::controller(WishListController::class)->group(function () {
    Route::get('/wishlist', 'wishListData')->name('wishlist.index');
    Route::post('/wishlist/store', 'storeWishListRecord')->name('wishlist.store');
    Route::get('/wishlist/remove', 'removeItem')->name('wishlist.remove');
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
        // Brand controller
        Route::resource('/model', ModelController::class);
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
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    Artisan::call('optimize');
    return "Configaration optimize successfully!";
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return "Storage Linked!";
});

/*
|--------------------------------------------------------------------------
| HTML Sitemap
|--------------------------------------------------------------------------
*/

Route::get('/sitemap', function () {

    $cars = Car::query()
        ->select(['id', 'slug', 'name'])
        ->orderBy('id')
        ->get();

    $blogs = Blog::query()
        ->select(['id', 'blog_slug', 'blog_title'])
        ->orderBy('id')
        ->get();

    $services = Service::query()
        ->select(['id', 'service_slug', 'service_title'])
        ->orderBy('id')
        ->get();

    return view('frontend.sitemap', compact(
        'cars',
        'blogs',
        'services'
    ));
})->name('sitemap');


/*
|--------------------------------------------------------------------------
| XML Sitemap Index
|--------------------------------------------------------------------------
*/

Route::get('/sitemap.xml', function () {

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';

    $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    $xml .= '<sitemap>';
    $xml .= '<loc>' . url('/sitemap-pages.xml') . '</loc>';
    $xml .= '</sitemap>';

    $xml .= '<sitemap>';
    $xml .= '<loc>' . url('/sitemap-cars.xml') . '</loc>';
    $xml .= '</sitemap>';

    $xml .= '<sitemap>';
    $xml .= '<loc>' . url('/sitemap-categories.xml') . '</loc>';
    $xml .= '</sitemap>';

    $xml .= '<sitemap>';
    $xml .= '<loc>' . url('/sitemap-blog.xml') . '</loc>';
    $xml .= '</sitemap>';

    $xml .= '</sitemapindex>';

    return response($xml, 200)
        ->header('Content-Type', 'application/xml');
})->name('sitemap.index');


/*
|--------------------------------------------------------------------------
| Pages Sitemap
|--------------------------------------------------------------------------
*/

Route::get('/sitemap-pages.xml', function () {

    $sitemap = Sitemap::create();

    $pages = [
        route('home'),
        route('about'),
        route('cars'),
        route('services'),
        route('testimonials'),
        route('contact'),
        route('calculator'),
        route('blogsPage'),
    ];

    foreach ($pages as $page) {
        $sitemap->add(
            Url::create($page)
        );
    }

    return $sitemap->toResponse(request());
})->name('sitemap.pages');


/*
|--------------------------------------------------------------------------
| Cars Sitemap
|--------------------------------------------------------------------------
*/

Route::get('/sitemap-cars.xml', function () {

    $sitemap = Sitemap::create();

    Car::get()
        ->each(function ($car) use ($sitemap) {

            $sitemap->add(
                Url::create(
                    route('car.details', $car->slug)
                )->setLastModificationDate(
                    $car->updated_at
                )
            );
        });

    return $sitemap->toResponse(request());
})->name('sitemap.cars');


/*
|--------------------------------------------------------------------------
| Categories Sitemap
|--------------------------------------------------------------------------
*/

Route::get('/sitemap-categories.xml', function () {

    $sitemap = Sitemap::create();

    Category::get()
        ->each(function ($category) use ($sitemap) {

            // Change this route according to your actual category route.

            $sitemap->add(
                Url::create(
                    url('/cars/category/' . $category->slug)
                )->setLastModificationDate(
                    $category->updated_at
                )
            );
        });

    return $sitemap->toResponse(request());
})->name('sitemap.categories');


/*
|--------------------------------------------------------------------------
| Blog Sitemap
|--------------------------------------------------------------------------
*/

Route::get('/sitemap-blog.xml', function () {

    $sitemap = Sitemap::create();

    Blog::get()
        ->each(function ($blog) use ($sitemap) {

            $sitemap->add(
                Url::create(
                    route('singleBlog', $blog->blog_slug)
                )->setLastModificationDate(
                    $blog->updated_at
                )
            );
        });

    return $sitemap->toResponse(request());
})->name('sitemap.blog');
