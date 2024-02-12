<?php
namespace App\Services\Impl;

use App\Models\Wallpaper;
use App\Services\ReviewService;
use Illuminate\Support\Facades\Storage;

class ReviewServiceImpl implements ReviewService
{
    public function getReview()
    {
        return Wallpaper::orderBy('id', 'desc')
              ->where('review', '=', 1)
              ->get();
    }

    public function acceptedReview($id)
    {
        $wallpaper = Wallpaper::find($id);
        $wallpaper->review = 0;
        $wallpaper->update();
    }


    public function deleteReview($id)
    {
        $wallpaper = Wallpaper::find($id);
        if($wallpaper->thumbnail)
        {
            Storage::delete($wallpaper->thumbnail);
        }
        if ($wallpaper->type)
        {
            Storage::delete($wallpaper->type);
        }
        $wallpaper->delete();
    }
}