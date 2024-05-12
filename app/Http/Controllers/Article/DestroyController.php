<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;


class DestroyController extends Controller
{

    //Восстановление
//        $article= Article::withTrashed()->findOrFail($id);
//        if ($article) {
//            $article->restore();
//        }
    public function __invoke($id)
    {
        $article = Article::query()->findOrFail($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index');
    }
}
