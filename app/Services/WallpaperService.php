<?php

namespace App\Services;

use Illuminate\Http\Request;

interface WallpaperService
{
    public function getWallpapers();
    public function getWallpapersById($id);
    public function getCategories();
    public function createWallpaper(Request $request);
    public function editWallpaper(Request $request, $id);
    public function deleteWallpaper($id);
    
  
}