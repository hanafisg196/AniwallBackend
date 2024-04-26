<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;
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

    public function slide():CategoryCollection
    {
        $category = Category::limit(5)->get();
        return new CategoryCollection($category);
    }


}
