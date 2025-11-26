<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index()
    {
        $compare = session()->get('compare', []);

        $compareCars = Car::with([
            'images:id,car_id,image_path',
            'brand:id,brand_title',
            'category:id,category_name',
        ])
            ->select([
                'id',
                'name',
                'brand_id',
                'rating',
                'price',
                'body_type',
                'condition',
                'milage',
                'transmission',
                'fuel_type',
                'year',
                'color',
                'doors',
                'cylenders',
                'engine',
                'vin_number',
            ])
            ->whereIn('id', $compare)->get();

        // return $compareCars;

        return view('frontend.compare-car', compact('compareCars'));
    }

    public function addToCompare(Request $request)
    {
        $carId = $request->car_id;

        $compare = session('compare', []);

        // if already added 3 items in compare then return this response
        if (count($compare) >= 4) {
            return response()->json([
                'status' => 'max',
                'message' => 'Compare item reached max limit!',
            ]);
        }

        // if isnot isset this car id in compare array then store it
        if (!in_array($carId, $compare)) {
            session()->push('compare', $carId);
        }

        return response()->json([
            'status' => true,
            'message' => 'Compare item added',
        ]);
    }

    public function removeFromCompare(Request $request)
    {
        $carId = $request->car_id;

        $compare = session()->get('compare', []);

        $compare = array_diff($compare, [$carId]);

        session()->put('compare', $compare);

        return response()->json(['status' => 'Car removed from compare']);
    }

    public function countCompareItems()
    {
        return response()->json(['count' => count(session()->get('compare', []))]);
    }
}
