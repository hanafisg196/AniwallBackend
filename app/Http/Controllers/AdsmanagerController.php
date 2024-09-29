<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Services\AdService;
use Illuminate\Http\Request;

class AdsmanagerController extends Controller
{
    private AdService $adService;

    public function __construct(AdService $adService)
    {
        $this->adService = $adService;
    }

    public function index()
    {
        $data = $this->adService->getAdsId();
        return view('dashboard.adsmanager')->with('data', $data);
    }

    public function update(Request $request){
         $this->adService->updateAds($request);
        return redirect()->back()->with('success', 'ads updated');
    }
}
