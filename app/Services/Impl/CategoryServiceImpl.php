<?php
namespace App\Services\Impl;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryServiceImpl implements CategoryService {

    public function getCategories()
    {
        return Category::paginate(10);
       
    }

    public function createCategory(Request $request)
    {
      
      $name = $request->input('name');
      $image = $request->file('image')->store('images');
    
      $category = new Category([
            'name' => $name,
            'image' => $image,
      ]);

      $category->save();

       
    }


    public function editCategory(Request $request, $id)
    {
       $category = Category::find($id);

       $name = $request->input('name');

       if($request->hasFile('image') && $request->file('image')->isValid())
       {
          if ($category->image) {
            Storage::delete($category->image);
          }

          $image = $request->file('image');
          $imagePath = $image->store('images');
       } else {

         $imagePath = $category->image;
         
       }
    
        $category->name = $name;
        $category->image = $imagePath;

        $category->update();
      

       
    }
    public function deleteCategory($id)
    {
      $category = Category::find($id);

      if($category->image)
      {
        Storage::delete($category->image);
      }
      
       $category->destroy($id);
    }
    
    
}


