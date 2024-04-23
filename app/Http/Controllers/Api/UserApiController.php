<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    
    public function test()
    {
        return response()->json([
            'data' => 'hahahayeyehayahahayyeyehe felling good man'
        ], 200);
    }
}
