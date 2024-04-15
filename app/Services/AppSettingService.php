<?php

namespace App\Services;

use Illuminate\Http\Request;

interface AppSettingService {

   public function getAppSetting();
   public function updateAppSetting(Request $request);
 
   }
