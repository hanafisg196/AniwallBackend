<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WallpaperController extends Controller
{
    
    public function index()
    {
        return view('dashboard.wallpaper');
    }
}
