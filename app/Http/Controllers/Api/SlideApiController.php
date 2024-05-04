<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SlideResourceCollection;
use App\Models\Slide;


class SlideApiController extends Controller
{
    public function slide():SlideResourceCollection
    {
        $category = Slide::limit(5)->get();
        return new SlideResourceCollection($category);
    }

}