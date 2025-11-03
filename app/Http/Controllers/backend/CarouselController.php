<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::latest()->get();
        return view('backend.carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'carousel_subtitle' => 'required|string|max:255',
            'carousel_title' => 'required|string|max:255',
            'carousel_text' => 'required|string|max:255',
            'carousel_status' => 'required|integer|min:1',
            'carousel_image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'carousel_background' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);

        try {
            foreach (['carousel_image', 'carousel_background'] as $image) {
                if ($request->hasFile($image)) {
                    $data[$image] = uploadFiles($request->file($image), 'uploads/carousel');
                }
            }

            Carousel::create($data);
            Cache::forget('carousels');

            return redirect()->back()->with(['success' => 'Carousel item added successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while store new carousel: ' . $e->getMessage());
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
        $carousel = Carousel::findOrFail($id);

        return view('backend.carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'carousel_subtitle' => 'required|string|max:255',
            'carousel_title' => 'required|string|max:255',
            'carousel_text' => 'required|string|max:255',
            'carousel_status' => 'required|integer|min:1',
            'carousel_image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'carousel_background' => 'nullable|image|mimes:png,jpg,jpeg,gif',
        ]);

        try {
            $carousel = Carousel::findOrFail($id);

            foreach (['carousel_image', 'carousel_background'] as $image) {
                if ($request->hasFile($image)) {
                    $data[$image] = uploadFiles($request->file($image), 'uploads/carousel', $carousel->$image);
                } else {
                    $data[$image] = $carousel->$image;
                }
            }

            $carousel->update($data);
            Cache::forget('carousels');

            return redirect()->route('admin.carousel.index')->with(['success' => 'Carousel item updated successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while update carousel: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carousel = Carousel::findOrFail($id);

        try {
            foreach (['carousel_image', 'carousel_background'] as $image) {
                $oldImage = public_path('storage/' . $carousel->$image);

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            $carousel->delete();
            Cache::forget('carousels');
            return redirect()->route('admin.carousel.index')->with(['success' => 'Carousel item updated successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while delete carousel: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }
}
