<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\SlideApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\WallpaperApiController;
use App\Http\Middleware\ApiAuthMiddleware;
use Illuminate\Http\Request;
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
    Route::get('/wallpaper/test', [WallpaperApiController::class, 'test'] );
    Route::get('/wallpaper/latest', [WallpaperApiController::class, 'latest'] );
    Route::get('/wallpaper/popular', [WallpaperApiController::class, 'popular'] );
    Route::get('/wallpaper/detail/{id}', [WallpaperApiController::class, 'detail']);
    Route::get('/wallpaper/random', [WallpaperApiController::class, 'random'] );
    Route::get('/wallpaper/categories', [CategoryApiController::class, 'categories'] );
    Route::get('/wallpaper/slide', [SlideApiController::class, 'slide'] );
    Route::get('/wallpaper/wallpapersByCat/{id}', [CategoryApiController::class, 'wallpapersByCat'] );

});
