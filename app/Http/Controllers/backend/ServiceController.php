<?php

namespace App\Http\Controllers\backend;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('backend.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.service.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'service_title' => 'required|string|max:255',
            'service_image' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif',
            'service_icon' => 'nullable|string|max:255',
            'service_text' => 'required|string|max:255',
            'service_description' => 'required|string',
            'meta_title' => 'required|string|max:100',
            'meta_description' => 'required|string|max:160',
            'meta_keywords' => 'required|string|max:160',
        ]);

        try {
            $originalSlug = Str::slug($request->service_title);
            $slug = $originalSlug;
            $counter = 1;

            while (Service::where('service_slug', $slug)->exists()) {
                $slug = "$originalSlug-$counter";
                $counter++;
            }

            $data['service_slug'] = $slug;

            if ($request->hasFile('service_image')) {
                $data['service_image'] = uploadFiles($request->file('service_image'), "uploads/service");
            }

            Service::create($data);
            Cache::forget('services');

            return redirect()->route('admin.service.index')->with(['success' => 'Service created successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while store service: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('backend.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'service_title' => 'required|string|max:255',
            'service_image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif',
            'service_icon' => 'nullable|string|max:255',
            'service_text' => 'required|string|max:255',
            'service_description' => 'required|string',
            'meta_title' => 'required|string|max:100',
            'meta_description' => 'required|string|max:160',
            'meta_keywords' => 'required|string|max:160',
        ]);

        $service = Service::findOrFail($id);

        try {
            if ($request->service_slug !== $service->service_slug) {
                $originalSlug = Str::slug($request->service_title);
                $slug = $originalSlug;
                $counter = 1;

                while (Service::where('service_slug', $slug)->where('id', '!=', $service->id)->exists()) {
                    $slug = "$originalSlug-$counter";
                    $counter++;
                }

                $data['service_slug'] = $slug;
            }

            if ($request->hasFile('service_image')) {
                $data['service_image'] = uploadFiles($request->file('service_image'), "uploads/service", $service->service_image);
            }

            $service->update($data);
            Cache::forget('services');

            return redirect()->route('admin.service.index')->with(['success' => 'Service updated successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while update service: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        try {
            $image = public_path('storage/' . $service->service_image);

            if (file_exists($image)) {
                unlink($image);
            }

            $service->delete();

            Cache::forget('services');

            return redirect()->back()->with(['success' => 'Service deleted successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while delete service: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }
}
