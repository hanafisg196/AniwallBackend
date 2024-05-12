<?php

namespace App\Http\Controllers;

use App\Services\SlideService;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    private SlideService $slideService;

    public function __construct(SlideService $slideService)
    {
        $this->slideService = $slideService;
    }

    public function index()
    {
        $data = $this->slideService->getSlide();
        return view('dashboard.slide')
        ->with([
            'data'=> $data,
        ]);
    }

    public function create(Request $request)
    {
        $this->slideService->createSlide($request);
        return redirect()->back()->with('success', 'Slide added successfully');
    }

    public function edit(Request $request,$id)
    {
        $this->slideService->updateSlide($request,$id);
        return redirect()->back()->with('success', 'Slide updated successfully');
    }

    public function delete(string $id)
    {
        $this->slideService->deleteSlide($id);
        return redirect()->back()->with('success', 'Slide deleted successfully');
    }

}
