<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{


    public function profile(Request $request)
    {
        $user = $request->attributes->get('user');
        return response()->json(['user' => $user]);
    }


}
