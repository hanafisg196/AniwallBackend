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
        return Wallpaper::orderBy('id', 'desc')
        ->where('review', '=', 0)
        ->paginate(10);
    }

    public function getWallpapersById($id)
    {
       return  Wallpaper::find($id);
       
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

    private function formateSize($file)
    {
        $sizeInBytes = filesize($file);
        $sizeInMb = $sizeInBytes / (1024 * 1024);
        return number_format($sizeInMb,2);
    }
    
    public function createWallpaper(Request $request)
    {
        
        $title = $request->input('title');
        $resolution = $request->input('resolution');
        $cat_id = $request->input('cat_id');
        $type = $request->file('type');
        $tags = explode(',', $request->tags);
        $size = $this->formateSize($type);
       
      


        if ($type->getClientOriginalExtension() == 'mp4') {
          
            $path = $type->store('videos');
            $thumbnailFilename = pathinfo($path, PATHINFO_FILENAME) . '.webp';
            $wallpaper = new Wallpaper([

                'title' => $title,
                'thumbnail'=> $thumbnailFilename,
                'type' => $path,
                'resolution' => $resolution,
                'cat_id' => $cat_id,
                'size'=> $size.'.mb',
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
                'size'=> $size.'.mb',
                'user_id' => auth()->user()->id
              
            ]);
        }
         $wallpaper->save();
         $wallpaper->detachTags($tags);
         $wallpaper->attachTags($tags);
           

        if ($type->getClientMimeType() == 'video/mp4') {
            
            GenerateThumbnailVideo::dispatch($wallpaper);
        }
        
        
 
    }
    public function editWallpaper(Request $request, $id)
    {
        $wallpaper = Wallpaper::find($id);
        $title = $request->input('title');
        $cat_id = $request->input('cat_id');
        $resolution = $request->input('resolution');
      
    
        if($request->hasFile('type') && $request->file('type')->isValid())
        {
            // Delete the old type file if it exists
            if ($wallpaper->type) {
                Storage::delete($wallpaper->type);
            }
             // Store the new type file
            $type = $request->file('type');
            $path = ($type->getClientOriginalExtension() == 'mp4') ?
            $type->store('videos') : $type->store('images');
            
        } else{
            // If no new thumbnail file is provided, use the existing path
            $path = $wallpaper->type;
        }
    
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
     
            if ($wallpaper->thumbnail) {
                Storage::delete($wallpaper->thumbnail);
            }
    
           
            $thumb = $request->file('thumbnail');
            $thumbPath = $thumb->store('thumbs');
        } else {
          
            $thumbPath = $wallpaper->thumbnail;
        }

        $tags = explode(',', $request->input('tags'));
        $wallpaper->detachTags($tags);
        $wallpaper->attachTags($tags);
       
        $wallpaper->title = $title;
        $wallpaper->cat_id = $cat_id;
        $wallpaper->thumbnail = $thumbPath;
        $wallpaper->resolution = $resolution;
        $wallpaper->type = $path;
        $wallpaper->update();
        
    }
    public function deleteWallpaper( $id)
    {
        $wallpaper = Wallpaper::find($id);
        if($wallpaper->type)
        {
            Storage::delete($wallpaper->type);
        }
        if ($wallpaper->thumbnail)
        {
            Storage::delete($wallpaper->thumbnail);
        }
        $wallpaper->delete();
    }

}