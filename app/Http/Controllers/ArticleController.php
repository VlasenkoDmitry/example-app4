<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
//        $articles = Article::join('categories','categories.id', '=', 'articles.category_id')->select( 'articles.id','articles.title','articles.content','articles.image' ,'articles.likes', 'categories.title as categories_title')->get();
        $articles = Article::all();
        return view('articles', compact('articles'));
    }

    //firstOrCreate
    //UpdateOrCreate
    public function create()
    {
        $article = new Article();
        return view('create', compact('article'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|unique:articles',
            'content' => 'required|min:20',
            'image' => '',
            'likesUsers' => ''
        ]);

        $article = new Article();
        $article->fill($data);
        $article->save();
        return redirect()->route('articles.index');
    }

    public function show($id)
    {
//        $article = Article::query()->findOrFail($id);
//        dump($article->tags);
        $tag = Tag::query()->findOrFail($id);
        dump($tag->articles);

//        return view('show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::query()->findOrFail($id);
        return view('edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::query()->findOrFail($id);
        $data = $this->validate($request, [
            'title' => '',
            'content' => 'required|min:20',
            'image' => '',
            'likesUsers' => ''
        ]);
        $article->update($data);
        return redirect()->route('articles.show', $id);
    }

    //Восстановление
//        $article= Article::withTrashed()->findOrFail($id);
//        if ($article) {
//            $article->restore();
//        }
    public function destroy($id)
    {
        $article = Article::query()->findOrFail($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index');
    }
}
