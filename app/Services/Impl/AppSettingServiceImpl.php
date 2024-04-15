<?php

namespace App\Services\Impl;

use App\Models\AppSettings;
use App\Services\AppSettingService;
use Illuminate\Http\Request;

class AppSettingServiceImpl implements AppSettingService
{

    public function getAppSetting()
    {
         return AppSettings::first();
    }
   
    public function updateAppSetting(Request $request)
    {
       $appSetting = AppSettings::first();
       $packname = $request->input('packname');
       $api_key = $request->input('api_key');
       $appSetting->packname = $packname;
       $appSetting->api_key = $api_key;
       $appSetting->save();
    }
    

}