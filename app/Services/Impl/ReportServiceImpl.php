<?php
namespace App\Services\Impl;

use App\Models\Report;
use App\Models\ReportWallpaper;
use App\Services\ReportService;

class ReportServiceImpl implements ReportService
{
    public function getReport()
    {
        return ReportWallpaper::latest()->paginate();
    }
}
