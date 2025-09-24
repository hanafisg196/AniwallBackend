<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WallpaperDetailResource;
use App\Http\Resources\WallpaperOwnerResource;
use App\Http\Resources\WallpapersCollection;
use App\Http\Resources\WallpapersWithPagingCollection;
use App\Models\User;
use App\Models\Wallpaper;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class WallpaperApiController extends Controller
{

    public function dataNotFound($data){
        if (!$data) {
            throw new HttpResponseException(
                response()
                    ->json([
                        'errors' => [
                            'message' => ['wallpaper not found'],
                        ],
                    ])
                    ->setStatusCode(404),
            );
        }
    }

    public function test()
    {
        return response()
            ->json([
                'message' => 'Reponse Working',
            ])
            ->setStatusCode(200);
    }

    public function latest(Request $request): WallpapersWithPagingCollection
    {
        $page = intval($request->query('page', 1));
        $perPage = intval($request->query('perPage', 5));
        $wallpapers = Wallpaper::where('review', '=', 0)
        ->latest()->paginate($perPage, ['*'], 'page', $page);
        $this->dataNotFound($wallpapers);
        return new WallpapersWithPagingCollection($wallpapers);
    }

    public function popular(Request $request): WallpapersWithPagingCollection
    {
        $page = intval($request->query('page', 1));
        $perPage = intval($request->query('perPage', 5));
        $wallpapers = Wallpaper::where('review', '=', 0)
        ->orderBy('view', 'desc')
        ->paginate($perPage, ['*'], 'page', $page);
        $this->dataNotFound($wallpapers);
        return new WallpapersWithPagingCollection($wallpapers);
    }

    public function random(): WallpapersCollection
    {
        $wallpapers = Wallpaper::
        where('review', '=', 0)
        ->inRandomOrder()->limit(5)->get();
        $this->dataNotFound($wallpapers);
        return new WallpapersCollection($wallpapers);
    }

    public function detail(int $id): WallpaperDetailResource
    {
        $wallpaper = Wallpaper::with(['category','users','tags'])->find( $id);
        $this->dataNotFound($wallpaper);
        return new WallpaperDetailResource($wallpaper);
    }

    public function wallpaperUserDetail(Request $request, $userId): WallpapersWithPagingCollection{
        $page = intval($request->query('page', 1));
        $perPage = intval($request->query('perPage', 5));
        $wallpapers = Wallpaper::where('user_id', $userId)
            ->where('review', '=', 0)->latest()
            ->paginate($perPage, ['*'], 'page', $page);
        $this->dataNotFound($wallpapers);
        return new WallpapersWithPagingCollection($wallpapers);
    }

    public function wallpapersOwner($userId):WallpaperOwnerResource{
        $user = User::with('wallpapers')->find($userId);
        return new WallpaperOwnerResource($user);
    }

    public function searchWallpaper(Request $request, $keyword): WallpapersWithPagingCollection
    {
        $page = intval($request->query('page', 1));
        $perPage = intval($request->query('perPage', 5));
        $wallpapersQuery = Wallpaper::query();
        $wallpapersQuery->where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('tags', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            });
        $wallpapers = $wallpapersQuery->latest()->paginate($perPage, ['*'], 'page', $page);
        $this->dataNotFound($wallpapers);
        return new WallpapersWithPagingCollection($wallpapers);
    }


}
