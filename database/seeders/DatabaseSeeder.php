<?php

namespace Database\Seeders;

use App\Models\Ads;
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
            'token' => $token,
            'avatar'=> 'https://i.ibb.co.com/4f5dzqF/0fb057b1927bc50d55cf7946071dc3fd.jpg'
        ]);

        Category::create([
            'name' => 'Anime',
            'image' => 'img.jpg',
        ]);

        AppSettings::create([
            'package_name' => 'com.anime.live_wallpapershd',
            'api_key' => '50f86f40-71a0-4459-9682-b62a291e3acd',
        ]);

       Ads::create([
            'admob_app_id' => 'ca-app-pub-3940256099942544/9214589741',
            'admob_banner' => 'ca-app-pub-3940256099942544/9214589741',
            'admob_native' => 'ca-app-pub-3940256099942544/1044960115',
            'admob_interstitial'=> 'ca-app-pub-3940256099942544/1033173712',
            'admob_open' => 'ca-app-pub-3940256099942544/9257395921',
            'admob_reward' => 'ca-app-pub-3940256099942544/5224354917',
            'interstitial_click' => 4,
            'native_item' => 4,
            'refresh_stat' => true
       ]);

    }
}
