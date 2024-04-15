<?php

namespace Database\Seeders;

use App\Models\AppSettings;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Anime',
            'image' => 'img.jpg',
        ]);
        AppSettings::create([
            'package_name' => 'com.example.test',
            'api_key' => 'cXchH3mpzxzTo5I6',
        ]);
        
    }
}
