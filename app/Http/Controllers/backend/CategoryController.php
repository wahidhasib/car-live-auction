<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.category.index', compact('categories'));
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
            'category_name' => 'required|string|max:50',
            'category_slug' => 'required|string|unique:categories,category_slug',
            'category_image' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);

        try {
            if ($request->hasFile('category_image')) {
                $data['category_image'] = uploadFiles($request->category_image, "uploads/categories");
            }

            Category::create($data);
            Cache::forget('categories');

            return redirect()->back()->with(['success' => 'Category added successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while store a new category: ' . $e->getMessage());
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
        $category = Category::findOrFail($id);

        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:50',
            'category_slug' => 'required|string|unique:categories,category_slug,' . $id,
            'category_image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
        ]);

        try {
            $category = Category::findOrFail($id);

            if ($request->hasFile('category_image')) {
                $data['category_image'] = uploadFiles($request->category_image, "uploads/categories", $category->category_image);
            } else {
                $data['category_image'] = $category->category_image;
            }

            $category->update($data);
            Cache::forget('categories');

            return redirect()->route('admin.category.index')->with(['success' => 'Category updated successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while update category: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);

            $oldImage = public_path('storage/' . $category->category_image);

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            $category->delete();
            Cache::forget('categories');

            return redirect()->back()->with(['success' => 'Category deleted successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while delete category: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }
}
