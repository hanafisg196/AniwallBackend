<?php

namespace Database\Seeders;

use App\Models\AppSettings;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $token = Str::uuid();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'password' => bcrypt('rahasia'),
            'token' => $token
        ]);

        Category::create([
            'name' => 'Anime',
            'image' => 'img.jpg',
        ]);

        AppSettings::create([
            'package_name' => 'com.anime.live_wallpapershd',
            'api_key' => '50f86f40-71a0-4459-9682-b62a291e3acd',
        ]);

    }
}
