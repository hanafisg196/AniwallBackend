<?php

namespace App\Services\Impl;

use App\Jobs\GenerateThumbnailVideo;
use App\Models\Category;
use App\Models\User;
use App\Models\Wallpaper;
use App\Services\WallpaperService;
use Illuminate\Http\Request;

class WallpaperServiceImpl implements WallpaperService
{
    public function getWallpapers()
    {
        return Wallpaper::paginate(10);
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function createWallpaper(Request $request)
    {

        $title = $request->input('title');
        $cat_id = $request->input('cat_id');

        $type = $request->file('type');
        
        $path = ($type->getClientOriginalExtension() == 'mp4') ?
        $type->store('videos') : $type->store('images');

        $thumbnailFilename = pathinfo($path, PATHINFO_FILENAME) . '.jpg';
    
        $wallpaper = new Wallpaper([

            'title' => $title,
            'thumbnail'=> $thumbnailFilename,
            'type' => $path,
            'cat_id' => $cat_id,
            'user_id' => auth()->user()->id
          
        ]);

        $wallpaper->save();
        
        GenerateThumbnailVideo::dispatch($wallpaper);
        
    }


    }
