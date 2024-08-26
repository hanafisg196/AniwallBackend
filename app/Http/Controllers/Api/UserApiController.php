<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadWallpaperRequest;
use App\Http\Resources\UploadWallpaperResource;
use App\Models\User;
use App\Models\Wallpaper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserApiController extends Controller
{

    public function profile(Request $request)
    {
        $user = $request->attributes->get('user');
        return response()->json(['user' => $user]);
    }

    public function uploadWallpaper(UploadWallpaperRequest $request): JsonResponse {
        $user = Auth::user();
        $data = $request->validated();

        $wallpaper = new Wallpaper($data);
        $wallpaper->user_id = $user->id;
        $wallpaper->save();

        return (new UploadWallpaperResource($wallpaper))->response()->setStatusCode(201);


    }


}
