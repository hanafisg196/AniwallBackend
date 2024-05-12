<?php

namespace App\Services;

use Illuminate\Http\Request;

interface SlideService
{
    public function getSlide();
    public function getSlideById($id);
    public function createSlide(Request $request);
    public function updateSlide(Request $request, $id);
    public function deleteSlide($id);
}