<?php

namespace App\Services\Impl;


use App\Jobs\GenerateThumbnailVideo;
use App\Models\Category;
use App\Models\Slide;
use App\Models\Wallpaper;
use App\Services\WallpaperService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Tags\Tag;

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

    public function getSlide()
    {
        return Slide::all();
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

    private function getResolution($type,$pathFile)
    {

        if($type->getClientOriginalExtension() == 'mp4')
        {
            return '1080 x 1920';
        }
        else {
            $fileInfo = getimagesize($pathFile);
            $width = $fileInfo[0];
            $height = $fileInfo[1];
            return $width. ' x '. $height;

        }

    }


    public function createWallpaper(Request $request)
    {

        $title = $request->input('title');
        $cat_id = $request->input('cat_id');
        $slide_id = $request->input('slide_id');
        $type = $request->file('type');
        $tags = explode(',', $request->tags);
        $size = $this->formateSize($type);
        $resolution = $this->getResolution(
           $type, $type->path()
        );


        if ($type->getClientOriginalExtension() == 'mp4') {

            $path = $type->store('videos');
            $thumbnailFilename = pathinfo($path, PATHINFO_FILENAME) . '.jpg';
            $wallpaper = new Wallpaper([
                'title' => $title,
                'thumbnail'=> $thumbnailFilename,
                'type' => $path,
                'resolution' => $resolution,
                'cat_id' => $cat_id,
                'slide_id' => $slide_id,
                'size'=> $size.'.mb',
                'user_id' => auth()->user()->id

            ]);

        } else {

            $path = $type->store('images');
            $thumbnailFilename = pathinfo($path, PATHINFO_FILENAME) . '.jpg';
            $thumbnailPath = 'thumbs/' . $thumbnailFilename;
            $this->createThumbnailImage($type->path(), storage_path('app/public/' . $thumbnailPath));

            $wallpaper = new Wallpaper([

                'title' => $title,
                'thumbnail'=> $thumbnailPath,
                'type' => $path,
                'cat_id' => $cat_id,
                'slide_id' => $slide_id,
                'size'=> $size.'.mb',
                'resolution' => $resolution,
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
        $slide_id = $request->input('slide_id');
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
        $wallpaper->slide_id = $slide_id;
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

    public function searchWallpaper(Request $request)
    {

        $wallpaper = Wallpaper::when($request->has('search'), function($query) use ($request)
        {
            $query->where('title', 'LIKE', '%' . $request->search . '%')
            ->orWhereHas('tags', function($query) use ($request){
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            });

        });
        return $wallpaper->paginate(10);

    }

}
