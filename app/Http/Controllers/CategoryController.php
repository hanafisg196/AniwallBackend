<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
   private CategoryService $categoryService;
   public function __construct(CategoryService $categoryService)
   {
      $this->categoryService = $categoryService;
   }
   public function index()
   {
      $data = $this->categoryService->getCategories();
      return view('dashboard.categories')->with('data', $data);
   }

   public function addCategory(Request $request)
   {

         $request->validate([
         'name' =>'required',
         'image' =>'image|file|max:2048|',
         ]);

      $this->categoryService->createCategory($request);
      return redirect('/categories')->with('success','Successfully added category');
   }



   public function UpdateCategory(Request $request, String $id)
   {
         $request->validate([
         'name' =>'required',
         'image' =>'image|file|mimes:png,jpg,mp4|max:5120|',
         ]);

      $this->categoryService->editCategory($request, $id);

      return redirect('/categories')->with('success','Successfully updated category');
   }


   public function deleteCategory(String $id)
   {
      $this->categoryService->deleteCategory($id);
      return redirect('/categories')->with('success','Successfully deleted category');
   }



 
 
}
