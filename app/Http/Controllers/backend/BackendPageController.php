<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class BackendPageController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard');
    }

    public function settings()
    {
        $settings = Setting::firstOrfail();
        return view('backend.settings', compact('settings'));
    }
}
