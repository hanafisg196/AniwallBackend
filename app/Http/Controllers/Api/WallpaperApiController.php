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
    public function latest(Request $request):WallpapersCollection
    {
            $page = $request->input('page', 1);
            $size = $request->input('size',10);

            $wallpapers = Wallpaper::latest();
            $wallpapers = $wallpapers->paginate(perPage: $size, page: $page);

            return new WallpapersCollection($wallpapers);
        
    }

    public function popular(Request $request):WallpapersCollection
    {
        $page = $request->input('page', 1);
        $size = $request->input('size',10);

        $wallpapers = Wallpaper::orderBy('view', 'desc');
        $wallpapers = $wallpapers->paginate(perPage: $size, page: $page);

        return new WallpapersCollection($wallpapers);

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
