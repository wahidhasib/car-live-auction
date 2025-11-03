<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(20);
        return view('backend.brand.index', compact('brands'));
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
            'brand_title' => 'required|string|max:40|unique:brands,brand_title',
        ]);

        try {
            if ($request->hasFile('brand_logo')) {
                $data['brand_logo'] = uploadFiles($request->file('brand_logo'), "uploads/brands");
            }

            Brand::create($data);
            Cache::forget('brands');

            return redirect()->back()->with(['success' => 'Brand added successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while store new brand: ' . $e->getMessage());
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
        $brand = Brand::findOrFail($id);

        return view('backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'brand_title' => 'required|string|max:40|unique:brands,brand_title,' . $id,
        ]);

        try {
            $brand = Brand::findOrFail($id);

            if ($request->hasFile('brand_logo')) {
                $oldFile = public_path('storage/' . $brand->brand_logo);

                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }

                $data['brand_logo'] = uploadFiles($request->file('brand_logo'), "uploads/brands", $brand->brand_logo);
            } else {
                $data['brand_logo'] = $brand->brand_logo;
            }

            $brand->update($data);
            Cache::forget('brands');

            return redirect()->route('admin.brand.index')->with(['success' => 'Brand updated successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while update brand: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);

        try {
            $oldFile = public_path('storage/' . $brand->brand_logo);

            if (file_exists($oldFile)) {
                unlink($oldFile);
            }

            $brand->delete();
            Cache::forget('brands');

            return redirect()->back()->with(['success' => 'Brand item deleted successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while delete brand: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }
}
