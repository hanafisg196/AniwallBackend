<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdsResource;
use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function getAds(): AdsResource
    {
        $ads = Ads::first();
        return new AdsResource($ads);
    }
}
