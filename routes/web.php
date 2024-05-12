<?php

use App\Http\Controllers\AdsmanagerController;
use App\Http\Controllers\AppsettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\WallpaperController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [LoginController::class, 'index'] )->name('login');

Route::post('/login', [LoginController::class, 'doLogin'] );

//admin routes
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/dashboard', [DasboardController::class, 'index'] )->name('dashboard');
    Route::post('/logout', [LoginController::class, 'doLogout'] );
    Route::get('/categories', [CategoryController::class, 'index'] );
    Route::post('/categories/insert', [CategoryController::class, 'addCategory'] );
    Route::post('/categories/edit/{id}', [CategoryController::class, 'UpdateCategory'] );
    Route::post('/categories/delete/{id}', [CategoryController::class, 'deleteCategory'] );
    Route::get('/wallpaper', [WallpaperController::class, 'index'] );
    Route::post('/wallpaper', [WallpaperController::class, 'addWallpaper'] );
    Route::get('/wallpaper/view/{id}', [WallpaperController::class, 'getDataById'] );
    Route::post('/wallpaper/edit/{id}', [WallpaperController::class, 'UpdateWallpaper'] );
    Route::post('/wallpaper/delete/{id}', [WallpaperController::class, 'DeleteWallpaper'] );
    Route::get('/review', [ReviewController::class, 'index'] );
    Route::post('/review/accept/{id}', [ReviewController::class, 'accept'] );
    Route::post('/review/delete/{id}', [ReviewController::class, 'deleteReview'] );
    Route::get('/slide', [SlideController::class, 'index'] );
    Route::post('/slide', [SlideController::class, 'create'] );
    Route::post('/slide/update/{id}', [SlideController::class, 'edit'] );
    Route::post('/slide/delete/{id}', [SlideController::class, 'delete'] );
    Route::get('/tags', [TagsController::class, 'index'] );
    Route::get('/notification', [NotificationController::class, 'index'] );
    Route::get('/adsmanager', [AdsmanagerController::class, 'index'] );
    Route::get('/setting', [SettingController::class, 'index'] );
    Route::get('/appsetting', [AppsettingController::class, 'index'] );
    Route::post('/appsetting/update', [AppsettingController::class, 'update'] );
   
   
});