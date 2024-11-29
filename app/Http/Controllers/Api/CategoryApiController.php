<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Wallpaper;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{

    public function categories(Request $request)
    {
        $page = intval($request->query('page', 1));
        $perPage = intval($request->query('perPage', 5));

        $categories = Category::latest()
                    ->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'data' => $categories->items(),
            [
                'total' => $categories->total(),
                'per_page' => $categories->perPage(),
                'current_page' => $categories->currentPage(),
                'last_page' => $categories->lastPage(),
                'from' => $categories->firstItem(),
                'to' => $categories->lastItem()
            ]
        ]);
    }

    public function wallpapersByCat(Request $request, int $id) {

        $page = intval($request->query('page', 1));
        $perPage = intval($request->query('perPage', 5));

        $wallpapers = Wallpaper::where('cat_id', $id)
                     ->where('review', '=', 0)
                     ->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'data' => $wallpapers->items(),
            [
                'total' => $wallpapers->total(),
                'per_page' => $wallpapers->perPage(),
                'current_page' => $wallpapers->currentPage(),
                'last_page' => $wallpapers->lastPage(),
                'from' => $wallpapers->firstItem(),
                'to' => $wallpapers->lastItem()
            ]
        ]);


    }
}
