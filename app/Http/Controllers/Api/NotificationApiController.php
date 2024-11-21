<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wallpaper;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class NotificationApiController extends Controller
{
    public function sendNotification($wallpaperId){
        $credentials = (new Factory)->withServiceAccount(base_path('animwall-c2259-firebase-adminsdk-20yoo-a45f358d99.json'));
        $messaging = $credentials->createMessaging();
        $wallpaper = Wallpaper::find($wallpaperId);

        $deepLink = "https://kyoani-publisher.xyz/wallpaper/" . $wallpaper->id;

        $message = CloudMessage::fromArray([
            "notification" => [
                "title" => "New Wallpaper Uploaded",
                "body" => "Check out the new wallpaper: " . $wallpaper->title,
                'click_action' => $deepLink
            ],
            "data" => [
                "id" => $wallpaper->id
            ],
            "topic" => "global"
        ]);

        $messaging->send($message);
        return response()->json("send notification success");
    }


}
