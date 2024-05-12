<?php

namespace Database\Seeders;

use App\Models\AppSettings;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'password' => bcrypt('rahasia'),
        ]);

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
