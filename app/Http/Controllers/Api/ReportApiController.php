<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Http\Resources\ReportUserResource;
use App\Http\Resources\ReportWallpaperResource;
use App\Models\ReportUser;
use App\Models\ReportWallpaper;
use App\Models\User;
use App\Models\Wallpaper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
class ReportApiController extends Controller
{
    public function sendReportWallpaper(ReportRequest $requets, $wallpaperId): JsonResponse{
        $token = Str::uuid();
        $wallpaper = Wallpaper::find($wallpaperId);
        $data = $requets->validated();
        $report = new ReportWallpaper($data);
        $report->wallpaper_id = $wallpaperId;
        $report->wallpaper_name = $wallpaper->title;
        $report->report_token = $token;
        $report->owner_email = $wallpaper->users->email;
        $report->owner_name = $wallpaper->users->name;
        $report->save();
        return (new ReportWallpaperResource($report))
        ->additional([
            'message' => 'Your report has been successfully sent',
        ])->response()->setStatusCode(201);
    }

    public function sendReportUser(ReportRequest $request, $userId) :JsonResponse
    {
        $token = Str::uuid();
        $user = User::find($userId);
        $data = $request->validated();
        $report = new ReportUser($data);
        $report->userId = $userId;
        $report->user_name = $user->name;
        $report->user_email = $user->email;
        $report->user_id = $userId;
        $report->report_token = $token;
        return (new ReportUserResource($report))
        ->additional([
            'message' => 'Your report has been successfully sent',
        ])->response()->setStatusCode(201);
    }
}
