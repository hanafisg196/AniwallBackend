<?php

use App\Http\Controllers\AdsmanagerController;
use App\Http\Controllers\AppsettingController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
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


Route::get('/', function () {
    return view('dashboard.login');
})->name('login');

Route::get('/login', function () {
    return view('dashboard.login');
})->name('login');

Route::post('/login', [LoginController::class, 'doLogin'] )->middleware('guest');
//admin routes
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/dashboard', [DasboardController::class, 'index'] )->name('dashboard');
    Route::post('/logout', [LoginController::class, 'doLogout'] );
    Route::get('/wallpaper', [WallpaperController::class, 'index'] );
    Route::get('/categories', [CategoriesController::class, 'index'] );
    Route::get('/color', [ColorController::class, 'index'] );
    Route::get('/tags', [TagsController::class, 'index'] );
    Route::get('/notification', [NotificationController::class, 'index'] );
    Route::get('/adsmanager', [AdsmanagerController::class, 'index'] );
    Route::get('/appsetting', [AppsettingController::class, 'index'] );
   
    
   
});