<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\WallpapersCategoryPagingCollection;
use App\Http\Resources\WallpapersWithPagingCollection;
use App\Models\Category;
use App\Models\Wallpaper;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{

    private function dataNotFound($data)
    {
        if ($data->isEmpty()) {
            throw new HttpResponseException(
                response()
                    ->json([
                        'errors' => [
                            'message' => 'Category not found',
                        ],
                    ])
                    ->setStatusCode(404),
            );
        }
    }

    public function categoryDetail($catId): CategoryResource{
       $category = Category::find($catId);
       return new CategoryResource($category);
    }
    public function categories(Request $request)
    {
        $page = intval($request->query('page', 1));
        $perPage = intval($request->query('perPage', 5));

        $categories = Category::latest()
                    ->paginate($perPage, ['*'], 'page', $page);
                    $this->dataNotFound($categories);
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

    public function wallpapersByCat(Request $request, int $id): WallpapersWithPagingCollection {

        $page = intval($request->query('page', 1));
        $perPage = intval($request->query('perPage', 5));
        $wallpapers = Wallpaper::with('category')
                     ->where('cat_id', $id)
                     ->where('review', '=', 0)
                     ->paginate($perPage, ['*'], 'page', $page);
        $this->dataNotFound($wallpapers);
         return new WallpapersWithPagingCollection($wallpapers);

    }


}
