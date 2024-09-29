<?php
namespace App\Services;

use Illuminate\Http\Request;

interface AdService {
    public function getAdsId();
    public function updateAds(Request $request);
}
