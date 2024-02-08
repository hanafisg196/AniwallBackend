<?php

namespace App\Http\Controllers;

use App\Services\WallpaperService;
use Illuminate\Http\Request;

class WallpaperController extends Controller
{
    private WallpaperService $wallpaperService;
    public function __construct(WallpaperService $wallpaperService)
    {
        $this->wallpaperService = $wallpaperService;
    }
    
    public function index()
    {
        $data = $this->wallpaperService->getWallpapers();
        $category = $this->wallpaperService->getCategories();
        // return json_encode($data);
        return view('dashboard.wallpaper')->with(['data' => $data, 'category' => $category]);
    }

    public function addWallpaper(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'thumbnail' =>'required',
            'type' =>'required',
            'cat_id' =>'required',
            
        ]);
        $this->wallpaperService->createWallpaper($request);
        return redirect()->back()->with('success', 'Wallpaper added successfully');
    }
}
