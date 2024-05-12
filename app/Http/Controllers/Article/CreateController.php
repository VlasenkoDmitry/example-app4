<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;


class CreateController extends Controller
{
    public function __invoke()
    {
        $article = new Article();
        $categories = Category::all();
        $tags = Tag::all();

        return view('create', compact('article', 'categories', 'tags'));
    }
}
