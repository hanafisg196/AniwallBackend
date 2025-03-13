<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DasboardController extends Controller
{
    private DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        $wallpaper = $this->dashboardService->getCountWallpapers();
        $category = $this->dashboardService->getCountCategories();
        $slide = $this->dashboardService->getCountSlides();
        $tag = $this->dashboardService->getCountTags();

        return view('dashboard.dashboard')->with([
            'wallpaper' => $wallpaper,
            'category' => $category,
            'slide' => $slide,
            'tags' => $tag,
        ]);
    }

    public function saveLayout()
    {
        return response()->json(['message' => 'Layout saved successfully']);
    }

    public function getLayout()
    {
        return response()->json(['layout' => Session::get('theme_mode', 'light')]);
    }
}
