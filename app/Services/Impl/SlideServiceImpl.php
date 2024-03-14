<?php

namespace App\Services\Impl;

use App\Models\Category;
use App\Models\Slide;
use App\Services\SlideService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideServiceImpl implements SlideService
{
    public function getSlide()
    {
       return Slide::orderBy('id', 'desc')
             ->paginate(10);
    }
    public function getCategory()
    {
        return Category::all();
    }
    public function getSlideById($id)
    {
        return Slide::where('id', $id);
    }

   
    public function createSlide(Request $request)
    {
         $slide = new Slide;
         $validate = $request->validate([
         'name' => 'required','max:100',
         'image' =>'required','mimes:png,jpg',
         'cat_id' =>'required',
         'status' =>'required'
       ]);

         if($request->file('image'))
         {
            $validate['image'] = $request->file('image')->store('images');
         }

         $validate['cat_id'] = $request->input('cat_id');

         $slide->create($validate);
    }
    public function updateSlide(Request $request, $id)
    {
        $slide = Slide::where('id', $id);
        $validate = $request->validate([
            'name' =>'required','max:100',
            'image' =>'mimes:png,jpg',
            'cat_id' =>'required',
            'status' =>'required'
        ]);

       if($request->hasFile('image'))
       {
            if ($slide->image)
            {
                Storage::delete($slide->image);
            } else {
                $validate['image'] = $request->file('image')->store('images');
            }
       }

        $validate['cat_id'] = $request->input('cat_id');

        $slide->update($validate);
    }
    public function deleteSlide($id)
    {
        $slide = Slide::find($id);
        if($slide->image)
        {
            Storage::delete($slide->image);
        }
        $slide->destroy($id);
    }
}