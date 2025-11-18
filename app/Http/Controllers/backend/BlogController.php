<?php

namespace App\Http\Controllers\backend;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(20);
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_description' => 'required|string',
            'blog_image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'author_name' => 'required|string|max:80',
            'designation' => 'required|string|max:50',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:20',
        ]);

        try {
            if ($request->hasFile('blog_image')) {
                $data['blog_image'] = uploadFiles($request->file('blog_image'), "uploads/blogs");
            }

            $slug = Str::slug($request->blog_title);
            $originalSlug = $slug;
            $counter = 1;

            while (Blog::where('blog_slug', $slug)->exists()) {
                $slug = "$originalSlug-$counter";
                $counter++;
            }

            $data['blog_slug'] = $slug;

            Blog::create($data);
            Cache::forget('blogs');
            Cache::forget('latest-blogs');

            return redirect()->route('admin.blog.index')->with(['success' => 'Blog post added successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while store new blog: ' . $e->getMessage());
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
        $blog = Blog::findOrFail($id);
        return view('backend.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_description' => 'required|string',
            'blog_image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'author_name' => 'required|string|max:80',
            'designation' => 'required|string|max:50',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:20',
        ]);

        $blog = Blog::findOrFail($id);

        try {
            if ($request->hasFile('blog_image')) {
                $data['blog_image'] = uploadFiles($request->file('blog_image'), "uploads/blogs", $blog->blog_image);
            }

            // Generate slug only if title has changed
            if ($request->blog_title !== $blog->blog_title) {
                $slug = Str::slug($request->blog_title);
                $originalSlug = $slug;
                $counter = 1;

                while (Blog::where('blog_slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                    $slug = "{$originalSlug}-{$counter}";
                    $counter++;
                }

                $data['blog_slug'] = $slug;
            }

            $blog->update($data);
            Cache::forget('blogs');
            Cache::forget('latest-blogs');

            return redirect()->route('admin.blog.index')->with(['success' => 'Blog post updated successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while update blog: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        try {
            $image = public_path('storage/' . $blog->blog_image);

            if (file_exists($image)) {
                unlink($image);
            }

            $blog->delete();
            Cache::forget('blogs');
            Cache::forget('latest-blogs');

            return redirect()->route('admin.blog.index')->with(['success' => 'Blog post deleted successfully!']);
        } catch (\Exception $e) {
            Log::error('Something went wrong while delete blog: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }
}
