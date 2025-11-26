<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function headerSearch(Request $request)
    {
        try {
            $keyword = $request->keyword;

            if (!$keyword || strlen($keyword) < 1) {
                return '';
            }

            $searchCars = Car::with('images')
                ->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%")
                ->limit(10)
                ->get();

            if ($searchCars->isEmpty()) {
                return '<div class="list-group-item text-center text-muted">No result found</div>';
            }

            $html = '';

            foreach ($searchCars as $car) {
                $image = $car->images->first() && $car->images->first()->image_path
                    ? asset('storage/' . $car->images->first()->image_path)
                    : asset('frontend/img/car/01.jpg'); // fallback image

                $html .= '
        <a href="' . route('car.details', $car->slug) . '" 
           class="list-group-item list-group-item-action">

            <div class="d-flex align-items-center">
                <img src="' . $image . '" 
                     width="45" height="45" 
                     class="rounded me-3">

                <div>
                    <h6 class="mb-0">' . $car->name . '</h6>
                    <small class="text-muted">' . Str::limit($car->description, 40) . '</small>
                </div>
            </div>

        </a>';
            }

            return $html; // ✅ must return
        } catch (\Exception $e) {
            Log::error('Something went wrong: ' . $e->getMessage());
        }
    }


    public function filterCars(Request $request)
    {
        $query = Car::with([
            'brand:id,brand_title',
            'category:id,category_slug,category_name',
            'images:id,car_id,image_path'
        ])->latest();

        $query->when($request->brand_id, fn($q) => $q->where('brand_id', $request->brand_id));
        $query->when($request->body_type, fn($q) => $q->where('body_type', $request->body_type));
        $query->when($request->year, fn($q) => $q->where('year', $request->year));
        $query->when($request->condition, fn($q) => $q->where('condition', $request->condition));

        // Normal pagination with page numbers
        $filterCars = $query->paginate(8)->withQueryString();

        return view('frontend.filter-cars', compact('filterCars'));
    }
}
