<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles', compact('articles'));
    }

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
            'likes' => ''
        ]);

        $article = new Article();
        $article->fill($data);
        $article->save();
        return redirect()->route('articles.index');
    }

    public function show($id)
    {
        $article = Article::query()->findOrFail($id);
        return view('show', compact('article'));
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
            'likes' => ''
        ]);
        $article->update($data);
        return redirect()->route('articles.show', $id);
    }
    public function destroy($id)
    {
        $article = Article::query()->findOrFail($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index');
    }
}
