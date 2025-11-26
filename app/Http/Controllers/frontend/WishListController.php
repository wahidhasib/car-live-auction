<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function wishListData()
    {
        return response()->json([
            'items' => session('wishlist', [])
        ]);
    }

    public function storeWishListRecord(Request $request)
    {
        $wishList = session('wishlist', []);

        $carId = $request->id;

        // Check if this car already exists in wishlist
        if (isset($wishList[$carId])) {
            return response()->json([
                'success' => false,
                'message' => 'Item already added!',
                'data' => $wishList,
            ]);
        }

        // Save using carId as the key
        $wishList[$carId] = [
            'id' => $carId,
            'name' => $request->name,
            'brand' => $request->brand,
            'category' => $request->category,
            'image' => $request->image,
            'slug' => $request->slug,
        ];

        session(['wishlist' => $wishList]);

        return response()->json([
            'success' => true,
            'message' => 'Item added successfully!',
            'data' => $wishList
        ]);
    }

    public function removeItem(Request $request)
    {
        $wishlist = session('wishlist', []);

        if (isset($wishlist[$request->id])) {
            unset($wishlist[$request->id]);
            session(['wishlist' => $wishlist]);
        }

        return response()->json([
            'success' => true,
            'data' => $wishlist
        ]);
    }
}
