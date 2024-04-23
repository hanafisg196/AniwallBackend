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
       $packname = $request->input('package_name');
       $api_key = $request->input('api_key');
       $appSetting->package_name = $packname;
       $appSetting->api_key = $api_key;
       $appSetting->save();
    }
    

}