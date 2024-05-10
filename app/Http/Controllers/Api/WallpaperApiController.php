<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WallpaperResource;
use App\Http\Resources\WallpapersCollection;
use App\Models\Wallpaper;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class WallpaperApiController extends Controller
{

    public function test()
    {

        return response()->json([
            'message' => 'Reponse Working'
        ])->setStatusCode(200);
    }

    public function latest(Request $request)
{
    $page = intval($request->query('page', 1));
    $perPage = intval($request->query('perPage', 5));

    $wallpapers = Wallpaper::latest()
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


    public function popular(Request $request)
    {
        
    $page = intval($request->query('page', 1));
    $perPage = intval($request->query('perPage', 5));

    $wallpapers = Wallpaper::orderBy("view", "desc")
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

    public function random():WallpapersCollection {
     
        $wallpapers = Wallpaper::inRandomOrder()->limit(5)->get();
        return new WallpapersCollection($wallpapers);
    }

    public function detail( int $id): WallpaperResource
    {
        $wallpaper = Wallpaper::where('id', $id)->first();

        if(!$wallpaper)
        {
            throw new HttpResponseException(response()->json([
                'errors' => [
                    "message" => [
                        "wallpaper not found"
                    ]
                ]
                
            ])->setStatusCode(404));

            
        }

        return new WallpaperResource($wallpaper);

    }

    

}
