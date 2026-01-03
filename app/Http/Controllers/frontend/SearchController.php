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

        // Convert year string to array
        $years = $request->year ? explode(',', $request->year) : null;

        // Convert year string to array
        $years = $request->year ? explode(',', $request->year) : null;

        $query->when($request->brand_id, function ($q) use ($request) {
            $q->where('brand_id', $request->brand_id);
        });

        $query->when($request->model_id, function ($q) use ($request) {
            $q->where('model_id', $request->model_id);
        });

        $query->when($years && count($years) === 2, function ($q) use ($years) {
            $q->whereBetween('year', [$years[0], $years[1]]);
        });

        $query->when($request->condition, function ($q) use ($request) {
            $q->where('condition', $request->condition);
        });

        $filterCars = $query->paginate(8)->withQueryString();

        return view('frontend.filter-cars', compact('filterCars'));
    }
}
