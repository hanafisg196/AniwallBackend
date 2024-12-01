<?php
namespace App\Services\Impl;

use App\Models\Ads;
use App\Services\AdService;
use Illuminate\Http\Request;

class AdServiceImpl implements AdService{

    public function getAdsId(){
     return Ads::find(1);
    }

    public function updateAds(Request $request){


        $data = $request->validate([
          'admob_app_id' =>'required|string',
          'admob_banner' => 'required|string',
          'admob_interstitial' => 'required|string',
          'admob_reward' => 'required|string',
          'admob_open' => 'required|string',
          'admob_native' => 'required|string',
          'intestial_click' => 'required|numeric',
          'native_item' => 'required|string',

        ]);

        $ad = Ads::find(1);
        $ad->update($data);
    }
}
