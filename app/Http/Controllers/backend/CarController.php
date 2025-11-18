<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with(['brand:id,brand_title', 'category:id,category_name'])
            ->latest()
            ->paginate(20);

        return view('backend.car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('backend.car.add', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarStoreRequest $request)
    {
        $data = $request->validated();

        // Remove images field from $data
        unset($data['images']);

        DB::beginTransaction();

        try {
            $data['slug'] = Str::slug($data['name']);

            $car = Car::create($data);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = uploadFiles($image, 'uploads/cars');

                    CarImage::create([
                        'car_id' => $car->id,
                        'image_path' => $imagePath
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.car.index')->with('success', 'Car added successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Something went wrong while store new car: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong!');
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
        $brands = Brand::all();
        $categories = Category::all();
        $car = Car::with(['brand:id,brand_title', 'category:id,category_name'])->findOrFail($id);
        return view('backend.car.edit', compact('brands', 'categories', 'car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            unset($data['images']);

            // update slug if name changed
            if ($request->name !== $car->name) {
                $data['slug'] = Str::slug($request->name);
            }

            // handle new image exist
            $car->update($data);

            if ($request->hasFile('images')) {
                // Delete old imgaes
                foreach ($car->images as $img) {
                    $oldImg = public_path('storage/' . $img->image_path);

                    if (file_exists($oldImg)) {
                        unlink($oldImg);
                    }

                    $img->delete();
                }

                // store new images
                foreach ($request->file('images') as $image) {
                    $imagePath = uploadFiles($image, 'uploads/cars');

                    CarImage::create([
                        'car_id' => $car->id,
                        'image_path' => $imagePath
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.car.index')->with('success', 'Car updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Something went wrong while update car: ' . $e->getMessage());

            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);

        try {
            foreach ($car->images as $img) {
                $file = public_path('storage/' . $img->image_path);

                if (file_exists($file)) {
                    unlink($file);
                }

                $img->delete();
            }

            $car->delete();
            return redirect()->route('admin.car.index')->with('success', 'Car deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Somethign went wrong while delete car: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
