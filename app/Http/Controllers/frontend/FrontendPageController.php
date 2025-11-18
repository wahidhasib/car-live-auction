<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
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

        // return Setting::firstOrFail();

        return view('frontend.index', $data);
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

    public function contactPage()
    {
        return view('frontend.contact');
    }
}
