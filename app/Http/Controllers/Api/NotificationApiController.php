<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class NotificationApiController extends Controller
{
    public function sendNotification($wallpaperId)
    {
        $credentials = (new Factory)->withServiceAccount(base_path('firebase-service.json'));
        $messaging = $credentials->createMessaging();
        $wallpaper = Wallpaper::find($wallpaperId);

        $deepLink = "https://kyoani-publisher.xyz/wallpaper/" . $wallpaper->id;

        // Kirim pesan hanya dengan properti "data"
        $message = CloudMessage::fromArray([
            "data" => [
                "title" => "New Wallpaper Uploaded",
                "body" => "Check out the new wallpaper: " . $wallpaper->title,
                "link" => $deepLink
            ],
            "topic" => "global"
        ]);

        $messaging->send($message);

        return response()->json("send notification success");
    }


    public function sendToken(Request $request){
       $validate =  $request->validate([
            'deviceToken' => 'required|string',
        ]);
         Device::create([
            'device_token' => $validate['deviceToken']
         ]);
        return response()->json(['message' => 'Token stored successfully']);
    }


}
