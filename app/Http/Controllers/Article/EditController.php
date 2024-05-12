<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;


class EditController extends Controller
{
    public function __invoke($id)
    {
        $article = Article::query()->findOrFail($id);
        $categories = Category::all();
        $allTags = Tag::all();
        $articleTags = $article->tags;
        return view('edit', compact('article', 'categories', 'allTags', 'articleTags'));
    }
}
