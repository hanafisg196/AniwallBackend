<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use App\Services\CategoryService;
use App\Services\WallpaperService;
use Database\Seeders\CategorySeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class WallpaperServiceTest extends TestCase
{
    private WallpaperService $wallpaperService;

    public function setUp(): void
    {
        parent::setUp();

        $this->wallpaperService = $this->app->make(WallpaperService::class);
    }


    public function testService(): void
    {
        self::assertNotNull($this->wallpaperService);
    }

   
}
