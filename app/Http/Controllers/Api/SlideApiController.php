<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WallpapersWithPagingCollection;
use App\Models\Slide;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
class SlideApiController extends Controller
{
    private function dataNotFound($data)
    {
        if ($data->isEmpty()) {
            throw new HttpResponseException(
                response()
                    ->json([
                        'errors' => [
                            'message' => 'wallpaper not found',
                        ],
                    ])
                    ->setStatusCode(404),
            );
        }
    }
    public function slide()
    {
        $slide = Slide::limit(5)->get();
        return response()->json([
            'data' => $slide,
        ]);
    }

    public function slideWallpapers(Request $request, $slideId)
    {
        $page = intval($request->query('page', 1));
        $perPage = intval($request->query('perPage', default: 5));
        $wallpapers = Wallpaper::where('slide_id', $slideId)
            ->latest()
            ->paginate($perPage, ['*'], 'page', $page);
        $this->dataNotFound($wallpapers);
        return new WallpapersWithPagingCollection($wallpapers);
    }
}
