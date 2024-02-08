<?php

namespace App\Services;

use Illuminate\Http\Request;

interface WallpaperService
{
    public function getWallpapers();

    public function getCategories();
    public function createWallpaper(Request $request);
    
}