<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Carousel;
use App\Models\Setting;
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

        return view('frontend.index', $data);
    }

    public function aboutPage()
    {
        return view('frontend.about');
    }
}
