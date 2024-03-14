<?php
namespace App\Services\Impl;

use App\Models\Category;
use App\Models\Slide;
use App\Models\Wallpaper;
use App\Services\DashboardService;
use Spatie\Tags\Tag;

class DashboardServiceImpl implements DashboardService
{
    public function getCountWallpapers()
    {
        return Wallpaper::count();
    }

    public function getCountCategories()
    {
        return Category::count();
    }
    
    public function getCountSlides()
    {
        return Slide::count();
    }
    public function getCountTags()
    {
        return Tag::count();
    }
}