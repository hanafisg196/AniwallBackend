<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Services\CategoryService;
use Database\Seeders\CategorySeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use Tests\TestCase;

class CategoryServiceTest extends TestCase
{
    private CategoryService $categoryService;


    protected function setUp():void
    {
        parent::setUp();

        $this->categoryService = $this->app->make(CategoryService::class);
    }


    public function testService(): void
    {
        self::assertNotNull($this->categoryService);
    }


    

    public function testGetData()
    {
        $this->seed([DatabaseSeeder::class, CategorySeeder::class]);
        $data = $this->categoryService->getCategories();

        foreach($data as $item)
        {
            $this->assertEquals('Anime', $item->name);
            $this->assertEquals('img.jpg', $item->image);
        }


    }

 
    public function testSaveDataSuccess()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('test.jpg');
        $request = Request::create('', 'POST', ['name' => 'test']);
        $request->files->add(['image' => $file]);
        $this->categoryService->createCategory($request);

        $categories = $this->categoryService->getCategories();
         
        foreach ($categories as $item) {

            self::assertEquals('test', $item->name);
            self::assertEquals("image/".$file->hashName(), $item->image);

        }
        Storage::assertExists("image/".$file->hashName());
        
      
    }
    

public function testUpdate()
{
    $this->seed([DatabaseSeeder::class, CategorySeeder::class]);
    Storage::fake('public');
    $file = UploadedFile::fake()->create('update.jpg');
    $cat = Category::limit(1)->first();

    $request = Request::create('', 'PUT', ['name' => 'update']);
    $request->files->add(['image' => $file]);

    $this->categoryService->editCategory($request, $cat->id );
    $updatedCategory = Category::find($cat->id);

    $this->assertEquals('update', $updatedCategory->name);
    $this->assertEquals("image/".$file->hashName(), $updatedCategory->image);
}


public function testDelete()

{
    $this->seed([DatabaseSeeder::class, CategorySeeder::class]);

    $cat = Category::limit(1)->first();
    $this->categoryService->deleteCategory($cat->id);
    $deletedCategory = Category::find($cat->id);

    $this->assertNull($deletedCategory);
}



}
