<?php

namespace App\Http\Middleware;

use App\Models\AppSettings;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $packageName = $request->header('X-Android-PackageName');
        $serverKey = $request->header('api_key');


        $token = AppSettings::where('package_name', $packageName)
                                ->where('api_key', $serverKey)
                                ->first();

        if (!$token) {
            return response()->json(
                [
                    'error' => 'Unauthorized'
                ]
                , 401);
         }
                                
        return $next($request);
    }
}
