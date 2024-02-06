<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdsmanagerController extends Controller
{
    public function index()
    {
        return view('dashboard.adsmanager');
    }
}
