<?php

namespace App\Services\Impl;

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
        $thumbnail = $request->file('thumbnail')->store('thumbs');
        $cat_id = $request->input('cat_id');

        $type = $request->file('type');
        
        if ($type->getClientOriginalExtension() == 'mp4') {
          
            $typePath = $type->store('video');
        } else {
          
            $typePath = $type->store('image');
        }


    
        $wallpaper = new Wallpaper([

            'title' => $title,
            'thumbnail'=> $thumbnail,
            'type' => $typePath,
            'cat_id' => $cat_id,
            'user_id' => auth()->user()->id
          
        ]);

        $wallpaper->save();

        
    }


    }
