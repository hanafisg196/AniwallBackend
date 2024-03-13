<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    private TagService $tagService;
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }
    public function index()
    {
        $tags = $this->tagService->getAll();
        return view('dashboard.tags')->with('tags', $tags);
    }

}
