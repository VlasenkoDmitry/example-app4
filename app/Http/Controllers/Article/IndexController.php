<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;


class IndexController extends Controller
{
    public function __invoke()
    {
        //        $articles = Article::join('categories','categories.id', '=', 'articles.category_id')->select( 'articles.id','articles.title','articles.content','articles.image' ,'articles.likes', 'categories.title as categories_title')->get();
        $articles = Article::all();
        return view('articles', compact('articles'));
    }
}
