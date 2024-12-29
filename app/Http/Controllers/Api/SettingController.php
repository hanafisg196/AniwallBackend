<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settingDetail(){
        $setting = Settings::find(1);
        return response()->json([
            'data' => $setting
        ]);
    }
}
