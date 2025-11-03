<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\fileExists;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.testimonial.index', compact('testimonials'));
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
            'name' => 'required|string|max:40',
            'designation' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'comment' => 'required|string|max:255',
        ]);

        try {
            if ($request->hasFile('image')) {
                $data['image'] = uploadFiles($request->file('image'), "uploads/testimonials");
            }

            Testimonial::create($data);
            Cache::forget('testimonials');

            return redirect()->back()->with(['success' => 'Review added successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while store review: ' . $e->getMessage());
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
        $testimonial = Testimonial::findOrFail($id);

        return view('backend.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:40',
            'designation' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'comment' => 'required|string|max:255',
        ]);

        try {
            $testimonial = Testimonial::findOrFail($id);

            if ($request->hasFile('image')) {
                $oldFile = public_path('storage/' . $testimonial->image);

                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }

                $data['image'] = uploadFiles($request->file('image'), "uploads/testimonials", $testimonial->image);
            } else {
                $data['image'] = $testimonial->image;
            }

            $testimonial->update($data);
            Cache::forget('testimonials');

            return redirect()->route('admin.testimonial.index')->with(['success' => 'Review updated successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while update review: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        try {
            $oldFile = public_path('storage/' . $testimonial->image);

            if (file_exists($oldFile)) {
                unlink($oldFile);
            }

            $testimonial->delete();
            return redirect()->back()->with(['success' => 'Review deleted successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while delete review: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }
}
