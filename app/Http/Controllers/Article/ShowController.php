<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;


class ShowController extends Controller
{
    public function __invoke($id)
    {
        $article = Article::query()->findOrFail($id);
//        dump($article->tags);
//        $tag = Tag::query()->findOrFail($id);
//        dump($tag->articles);

        return view('show', compact('article'));
    }
}
