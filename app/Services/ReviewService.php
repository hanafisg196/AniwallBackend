<?php
namespace App\Services;

interface ReviewService
{
    public function getReview();
    public function acceptedReview($id);
    public function deleteReview($id);
 
}


