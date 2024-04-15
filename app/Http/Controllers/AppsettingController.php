<?php

namespace App\Http\Controllers;

use App\Services\AppSettingService;
use Illuminate\Http\Request;

class AppsettingController extends Controller
{

    private AppSettingService $appSettingService;

    public function __construct(AppSettingService $appSettingService)
    {
        $this->appSettingService = $appSettingService;
    }


        public function index()
    {
        $data = $this->appSettingService->getAppSetting();
        return view('dashboard.appsetting')->with('data', $data);
    }

    public function update(Request $request)
    {
       $this->appSettingService->updateAppSetting($request);
       return redirect()->back()->with('success', 'AppSetting updated successfully');
    }

}
