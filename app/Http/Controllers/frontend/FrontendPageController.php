<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FrontendPageController extends Controller
{
    public function homePage()
    {
        $data['carousels'] = Cache::remember('carousels', 3600, function () {
            return Carousel::latest()
                ->where('carousel_status', 1)
                ->get();
        });

        $data['brands'] = Cache::remember('brands', 3600, function () {
            return Brand::latest()->get();
        });

        $data['testimonials'] = Cache::remember('testimonials', 3600, function () {
            return Testimonial::latest()->get();
        });

        $data['categories'] = Cache::remember('categories', 3600, function () {
            return Category::latest()->get();
        });

        $data['latestBlogs'] = Cache::remember('latest-blogs', 3600, function () {
            return Blog::latest()->limit(3)->get();
        });

        $data['cars'] = Car::with([
            'brand:id,brand_title',
            'category:id,category_slug,category_name',
            'images:id,car_id,image_path'
        ])
            ->latest()
            ->limit(8)
            ->get();

        return view('frontend.index', $data);
    }

    public function getModels(Request $request)
    {
        $models = Car::select('id', 'name')
            ->where('brand_id', $request->brand_id)
            ->orderBy('name')
            ->get();

        return response()->json([
            'status' => true,
            'models' => $models
        ]);
    }

    public function carsPage()
    {
        $data['cars'] = Car::with([
            'brand:id,brand_title',
            'category:id,category_slug,category_name',
            'images:id,car_id,image_path'
        ])
            ->latest()
            ->paginate(20);

        return view('frontend.all-cars', $data);
    }

    public function loadCars(Request $request)
    {
        if ($request->ajax()) {

            $total = Car::count();
            $output = '';

            // Car condition labels & classes
            $conditions = [
                1 => ['label' => 'Brand New', 'class' => '1'],
                2 => ['label' => 'Pre-owned', 'class' => '2'],
                3 => ['label' => 'Used', 'class' => '3'],
            ];

            // Fetch cars with relations
            $results = Car::with([
                'brand:id,brand_title',
                'category:id,category_slug,category_name',
                'images:id,car_id,image_path'
            ])
                ->latest()
                ->skip($request->offset)
                ->limit(8)
                ->get();

            foreach ($results as $index => $car) {

                $imagePath = $car->images->first()->image_path ?? null;

                $statusClass = $conditions[$car->condition]['class'] ?? 'default';
                $statusLabel = $conditions[$car->condition]['label'] ?? 'N/A';

                $imageUrl = $imagePath && file_exists(public_path('storage/' . $imagePath))
                    ? asset('storage/' . $imagePath)
                    : asset('frontend/img/car/01.jpg');

                $output .= '
                    <div class="col-md-6 col-lg-4 col-xl-3 car-list-item">
                        <div class="car-item wow fadeInUp" data-wow-delay="' . ($index * 0.2) . 's">
                            <div class="car-img">
                                <span class="car-status status-' . $statusClass . '">' . $statusLabel . '</span>
                                <img src="' . $imageUrl . '" alt="' . $car->name . '">

                                <div class="car-btns">
                                    <a class="add-to-wishlist" 
                                        data-id="' . $car->id . '" 
                                        data-image="' . $imagePath . '" 
                                        data-name="' . $car->name . '" 
                                        data-brand="' . $car->brand->brand_title . '" 
                                        data-category="' . $car->category->category_name . '">
                                        <i class="far fa-heart"></i>
                                    </a>
                                    <a class="add-to-compare" data-id="' . $car->id . '"><i class="far fa-arrows-repeat"></i></a>
                                </div>
                            </div>

                            <div class="car-content">
                                <div class="car-top">
                                    <h4><a href="#">' . $car->name . '</a></h4>

                                    <div class="car-rate">';

                // Rating stars loop
                for ($i = 0; $i < $car->rating; $i++) {
                    $output .= '<i class="fas fa-star"></i>';
                }

                $output .= '<span>(' . $car->rating . ')</span>
                                    </div>
                                </div>

                                <ul class="car-list">
                                    <li><i class="far fa-steering-wheel"></i>' . $car->transmission . '</li>
                                    <li><i class="far fa-road"></i>' . $car->milage . '</li>
                                    <li><i class="far fa-car"></i>Model: ' . $car->year . '</li>
                                    <li><i class="far fa-gas-pump"></i>' . $car->category->category_name . '</li>
                                </ul>

                                <div class="car-footer">
                                    <span class="car-price">৳ ' . $car->price . '</span>
                                    <a href="' . route('car.details', $car->slug) . '" class="theme-btn">
                                        <span class="far fa-eye"></span>Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>';
            } // loop end

            return response()->json([
                'html' => $output,
                'hasMore' => ($request->offset + $results->count() < $total)
            ]);
        }
    }

    public function carDetails(string $slug)
    {
        $car = Car::with(['reviews', 'images:id,car_id,image_path'])
            ->where('slug', $slug)
            ->firstOrFail();
        // return $car;

        $relatedCars = Car::with('images:id,car_id,image_path')
            ->where('id', '!=', $car->id)
            ->where('body_type', $car->body_type)
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.car-details', compact('car', 'relatedCars'));
    }

    public function aboutPage()
    {
        $data['testimonials'] = Cache::remember('testimonials', 3600, function () {
            return Testimonial::latest()->get();
        });

        $data['brands'] = Cache::remember('brands', 3600, function () {
            return Brand::latest()->get();
        });

        return view('frontend.about', $data);
    }

    public function servicesPage()
    {
        $data['services'] = Cache::remember('services', 3600, function () {
            return Service::latest()->paginate(6);
        });

        return view('frontend.services', $data);
    }

    public function serviceDetails($slug)
    {
        $details = Service::where('service_slug', $slug)->firstOrFail();
        $allServices = Service::select('id', 'service_title', 'service_slug')->get();

        return view('frontend.service-details', compact('details', 'allServices'));
    }

    public function testimonialsPage()
    {
        $testimonials = Cache::remember('testimonials', 3600, function () {
            return Testimonial::latest()->get();
        });

        return view('frontend.testimonials', compact('testimonials'));
    }

    public function calculatorPage()
    {
        return view('frontend.emi-calculator');
    }

    public function contactPage()
    {
        return view('frontend.contact');
    }


    public function calculateEMI(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric|min:1',
            'rate' => 'required|numeric|between:0,100',
            'period' => 'required|numeric|min:1',
            'down_payment' => 'required|numeric|min:0'
        ]);

        $P = $request->price - $request->down_payment; // Loan Amount
        $R = ($request->rate / 12) / 100;              // Monthly Interest Rate
        $N = $request->period * 12;                    // Months

        // Prevent error when interest rate is 0%
        if ($R == 0) {
            $EMI = $P / $N;
        } else {
            $EMI = ($P * $R * pow(1 + $R, $N)) / (pow(1 + $R, $N) - 1);
        }

        // AJAX Response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'emi' => number_format($EMI, 2, '.', ''),
                'loan_amount' => number_format($P, 2, '.', ''),
                'total_payable' => number_format($EMI * $N, 2, '.', ''),
                'total_interest' => number_format(($EMI * $N) - $P, 2, '.', ''),
            ]);
        }

        // Fallback (non-ajax)
        return back()->with('emi', round($EMI));
    }

    public function commingSoonPage()
    {
        return view('frontend.comming-soon');
    }
}
