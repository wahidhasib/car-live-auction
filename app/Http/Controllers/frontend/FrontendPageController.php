<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendPageController extends Controller
{
    public function homePage()
    {
        return view('frontend.index');
    }

    public function aboutPage()
    {
        return view('frontend.about');
    }
}
