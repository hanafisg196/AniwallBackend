<?php

namespace App\Services\Impl;


use App\Jobs\GenerateThumbnailVideo;
use App\Models\Category;
use App\Models\Wallpaper;
use App\Services\WallpaperService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

    private function createThumbnailImage($imagePath, $thumbnailPath)
    {
        
        $image = Image::make($imagePath);
        $image->resize(300, 533);
        $image->save($thumbnailPath);
        return $thumbnailPath;
       
    }

    public function createWallpaper(Request $request)
    {
        $title = $request->input('title');
        $cat_id = $request->input('cat_id');
        $type = $request->file('type');

        if ($type->getClientOriginalExtension() == 'mp4') {
          
            $path = $type->store('videos');
            $thumbnailFilename = pathinfo($path, PATHINFO_FILENAME) . '.webp';
            $wallpaper = new Wallpaper([

                'title' => $title,
                'thumbnail'=> $thumbnailFilename,
                'type' => $path,
                'cat_id' => $cat_id,
                'user_id' => auth()->user()->id
              
            ]);

        } else {

            $path = $type->store('images');
            $thumbnailFilename = pathinfo($path, PATHINFO_FILENAME) . '.webp';
            $thumbnailPath = 'thumbs/' . $thumbnailFilename;
            $this->createThumbnailImage($type->path(), storage_path('app/public/' . $thumbnailPath));

            $wallpaper = new Wallpaper([

                'title' => $title,
                'thumbnail'=> $thumbnailPath,
                'type' => $path,
                'cat_id' => $cat_id,
                'user_id' => auth()->user()->id
              
            ]);
        }

         $wallpaper->save();

        if ($type->getClientMimeType() == 'video/mp4') {
            
            GenerateThumbnailVideo::dispatch($wallpaper);
        }
        
        
 
    }


    }
