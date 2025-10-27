<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\helper\fileUpload;

class SettingController extends Controller
{
    public function update(SettingUpdateRequest $request, $id)
    {
        $data = $request->validated();

        try {
            $setting = Setting::findOrFail($id);

            foreach (['header_logo', 'footer_logo', 'common_bg', 'fav_icon', 'about_image', 'banner_background', 'service_image', 'contact_image'] as $image) {
                if ($request->hasFile($image)) {
                    $data[$image] = uploadFiles($request->file($image), 'uploads/settings', $setting->$image);
                } else {
                    $data[$image] = $setting->$image;
                }
            }

            $setting->update($data);

            return redirect()->back()->with(['success' => 'Settings updated successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while update settings table : ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }
}
