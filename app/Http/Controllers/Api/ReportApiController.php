<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Http\Resources\ReportResource;
use App\Models\Report;
use App\Models\Wallpaper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
class ReportApiController extends Controller
{
    public function sendReport(ReportRequest $requets, $wallpaperId): JsonResponse{
        $token = Str::uuid();
        $wallpaper = Wallpaper::find($wallpaperId);
        $data = $requets->validated();
        $report = new Report($data);
        $report->wallpaper_id = $wallpaperId;
        $report->wallpaper_name = $wallpaper->title;
        $report->report_token = $token;
        $report->owner_email = $wallpaper->users->email;
        $report->owner_name = $wallpaper->users->name;
        $report->save();
        return (new ReportResource($report))
        ->additional([
            'message' => 'Your report has been successfully sent',
        ])
        ->response()->setStatusCode(201);
    }
}
