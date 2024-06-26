<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Google_Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    public function googleSignIn(Request $request)
    {
        $idToken = $request->input('idToken');

        $client = new Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]);
        $payload = $client->verifyIdToken($idToken);
        $now = now();
        $token = Str::uuid();

        if ($payload) {
            $googleId = $payload['sub'];
            $email = $payload['email'];
            $emailVerified = $payload['email_verified'];
            $name = $payload['name'];
            $profile = $payload['picture'];

            $user = User::where('email', $email)->first();

            if (!$user) {

                $user = User::create([
                    'email' => $email,
                    'name' => $name,
                    'avatar' => $profile,
                    'email_verified_at' => $now,
                    'email_verified' => $emailVerified,
                    'token' => $token,
                    'google_id' => $googleId
                ]);
            } else {

                $user->update([
                    'name' => $name,
                    'avatar' => $profile,
                    'email_verified_at' => $now,
                    'email_verified' => $emailVerified,
                    'token' => $token,
                    'google_id' => $googleId
                ]);
            }

            return response()->json([
                'message' => 'User signed in successfully',
                'user' => $user
            ], 200);
        } else {
            return response()->json(['message' => 'Invalid token'], 401);
        }
    }


}
