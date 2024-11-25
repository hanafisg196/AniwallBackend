<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\GoogleAuthController;
use App\Http\Controllers\Api\NotificationApiController;
use App\Http\Controllers\Api\ReportApiController;
use App\Http\Controllers\Api\SlideApiController;
use App\Http\Controllers\Api\WallpaperApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Middleware\AuthenticateUser;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware(ApiAuthMiddleware::class)->group(function () {
    Route::get('/wallpaper/test', [WallpaperApiController::class, 'test']);
    Route::get('/wallpaper/latest', [WallpaperApiController::class, 'latest']);
    Route::get('/wallpaper/popular', [WallpaperApiController::class, 'popular']);
    Route::get('/wallpaper/detail/{id}', [WallpaperApiController::class, 'detail']);
    Route::get('/wallpaper/random', [WallpaperApiController::class, 'random']);
    Route::get('/wallpaper/categories', [CategoryApiController::class, 'categories']);
    Route::get('/wallpaper/slide', [SlideApiController::class, 'slide']);
    Route::get('/wallpaper/slide/wallpapers/{slideId}', [SlideApiController::class, 'slideWallpapers']);
    Route::get('/wallpaper/wallpapersByCat/{id}', [CategoryApiController::class, 'wallpapersByCat']);
    Route::post('/wallpaper/googlesignin', [GoogleAuthController::class, 'googleSignIn']);
    Route::post('/wallpaper/report/{wallpaperId}', [ReportApiController::class, 'sendReport']);
    Route::post('/wallpaper/notification/token', [NotificationApiController::class, 'sendToken'] );
    Route::post('/wallpaper/notification/{wallpaperId}', [NotificationApiController::class, 'sendNotification']);
    Route::middleware(AuthenticateUser::class)->group(callback: function () {
        Route::get('/wallpaper/user/profile', [UserApiController::class, 'profile']);
        Route::post('/wallpaper/user/upload', [UserApiController::class, 'uploadWallpaper']);
        Route::get('/wallpaper/user/listwallpaper/{userId}', [UserApiController::class, 'wallpapersByuser']);
        Route::post('/wallpaper/user/savefavorite', [UserApiController::class, 'addFavorite']);
        Route::post('/wallpaper/user/removefavorite', [UserApiController::class, 'removeFavorite']);
        Route::get('/wallpaper/user/favorites/check/{wallpaperId}', [UserApiController::class, 'isFavorite']);
        Route::get('/wallpaper/user/favorites/{userId}', [UserApiController::class, 'listFavorites']);
    });
});
