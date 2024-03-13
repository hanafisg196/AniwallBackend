<?php

namespace App\Services\Impl;

use App\Services\TagService;
use Spatie\Tags\Tag;

class TagServiceImpl implements TagService
{
    public function getAll()
    {
        return Tag::paginate(10);
    }
}