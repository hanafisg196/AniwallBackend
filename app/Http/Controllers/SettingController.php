<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Settings::find(1);
        return view('dashboard.setting')->with('settings', $settings);
    }
    public function update(Request $request, $id){
        $validate = $request->validate([
            'privacy_police' => 'required|string',
            'term_service' => 'required|string',
            'developer' => 'required|string',
            'email' => 'required|string',
            'website' => 'required|string',
            'app_version' => 'required|string'
        ]);
        $settings = Settings::find(1);
        $settings->update($validate);
        return redirect()->back()->with('success', 'update success');
    }
}
