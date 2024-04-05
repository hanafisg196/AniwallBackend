<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;


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
         'image' =>'required|image|file|mimes:png,jpg|max:1024|',
         ]);

      $this->categoryService->createCategory($request);
      return redirect()->back()->with('success','Successfully added category');
   }



   public function UpdateCategory(Request $request, String $id)
   {
         $request->validate([
         'name' =>'required',
         'image' =>'image|file|mimes:png,jpg|max:1024|',
         ]);

      $this->categoryService->editCategory($request, $id);

      return redirect()->back()->with('success','Successfully updated category');
   }


   public function deleteCategory(String $id)
   {
      $this->categoryService->deleteCategory($id);
      return redirect()->back()->with('success','Successfully deleted category');
   }



 
 
}
