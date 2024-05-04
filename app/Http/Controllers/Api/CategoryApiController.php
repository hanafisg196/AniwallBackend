<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use App\Models\Slide;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function categories(Request $request):CategoryCollection
    {
       $page = $request->input('page', 1);
       $size = $request->input('size',10);

       $categories = Category::latest();
       $categories = $categories->paginate(perPage: $size, page:$page);
       return new CategoryCollection($categories);
    }

   


}
