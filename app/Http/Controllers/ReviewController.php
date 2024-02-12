<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;

use Illuminate\Http\Request;

class ReviewController extends Controller
{

    private ReviewService $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        $data = $this->reviewService->getReview();
        return view('dashboard.review')
               ->with('data', $data);
    }

    public function accept(string $id)
    {
        $this->reviewService->acceptedReview($id);
        return redirect()->back()->with('success', 'Review accepted');
    }


    public function deleteReview(string $id)
    {
        $this->reviewService->deleteReview($id);
        return redirect()->back()->with('success', 'Review deleted');
    }
}
