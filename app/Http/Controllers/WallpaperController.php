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
       
        return view('dashboard.wallpaper')->with([
            'data' => $data, 'category' => $category
        ]);
    }

    public function getDataById(string $id)
    {
        $data = $this->wallpaperService->getWallpapersById($id);
        $category = $this->wallpaperService->getCategories();

        
        return view('dashboard.updatewallpaper')->with([
            'data' => $data, 'category' => $category
        ]);
    }

    public function addWallpaper(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'type' =>'required|mimes:jpg,png,mp4|max:20480',
            'cat_id' =>'required',
           
            
        ]);
        $this->wallpaperService->createWallpaper($request);
        return redirect()->back()->with('success', 'Wallpaper added successfully');
    }


    public function UpdateWallpaper(Request $request, $id)
    {
        $request->validate([
            'title' =>'required',
            'type' =>'mimes:jpg,png,mp4|max:20480',
            'cat_id' =>'required',
            'resolution' =>'required',
            'thumbnail' =>'mimes:jpg,png,webp|max:1024',
        ]);

        
        $this->wallpaperService->editWallpaper($request, $id);
        return redirect('/wallpaper')->with('success', 'Wallpaper Update successfully');
    }



    public function DeleteWallpaper( string $id)
    {
        $this->wallpaperService->deleteWallpaper( $id);
        return redirect()->back()->with('success', 'Wallpaper deleted successfully');
    }

    
    
}
