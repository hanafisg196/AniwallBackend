<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Http\Request;
class ReportController extends Controller
{
    protected $reportService;
    public function __construct(
        ReportService $reportService
    ){
        $this->reportService = $reportService;
    }
    public function index()
    {
        $data = $this->reportService->getReport();
        return view('dashboard.report')->with('data', $data);
    }
}
