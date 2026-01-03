<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = CarModel::latest()->paginate(20);
        $brands = Brand::select('id', 'brand_title')->latest()->get();
        return view('backend.model.index', compact('models', 'brands'));
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
            'title' => 'required|string|max:60',
            'brand_id' => 'required|exists:brands,id',
        ]);

        try {
            CarModel::create($data);
            Cache::forget('models');

            return redirect()->back()->with(['success' => 'Model added successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while store new model: ' . $e->getMessage());
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
        $model = CarModel::findOrFail($id);
        $brands = Brand::select('id', 'brand_title')->latest()->get();

        return view('backend.model.edit', compact('model', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:60',
            'brand_id' => 'required|exists:brands,id',
        ]);

        try {
            $model = CarModel::findOrFail($id);

            $model->update($data);

            Cache::forget('models');

            return redirect()->route('admin.model.index')->with(['success' => 'Model updated successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while update model: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = CarModel::findOrFail($id);

        try {
            $model->delete();
            Cache::forget('models');

            return redirect()->back()->with(['success' => 'Model item deleted successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while delete model: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }
}
