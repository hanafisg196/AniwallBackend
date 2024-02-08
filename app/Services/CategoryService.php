<?php

namespace App\Services;

use Illuminate\Http\Request;

interface CategoryService
{

    public function getCategories();
    public function createCategory(Request $request);
    public function editCategory(Request $request, $id);
    public function deleteCategory($id);
   
    


}