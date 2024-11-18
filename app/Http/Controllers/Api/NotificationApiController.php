<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class NotificationApiController extends Controller
{
    public function sendNotification(){
        $credentials = (new Factory)->withServiceAccount(base_path('animwall-c2259-firebase-adminsdk-20yoo-a45f358d99.json'));
        $messaging = $credentials->createMessaging();
        $message = CloudMessage::fromArray([
            "notification" => [
                "title" => "test notif",
                "body" => "This Body Notif"
            ],
            "topic" => "global"
        ]);
        $messaging->send($message);
        return response()->json("Sending Notif is work");
    }



}
