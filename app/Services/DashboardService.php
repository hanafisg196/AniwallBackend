<?php
namespace App\Services;

interface DashboardService {

    public function getCountWallpapers();
    public function getCountCategories();
    public function getCountSlides();
    public function getCountTags();
    
}