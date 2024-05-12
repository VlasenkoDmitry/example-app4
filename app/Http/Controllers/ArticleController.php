<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
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
        $categories = Category::all();
        $tags = Tag::all();

        return view('create', compact('article', 'categories', 'tags'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|unique:articles',
            'content' => 'required|min:20',
            'image' => 'required|min:4',
            'likesUsers' => '',
            'category_id' => '',
            'tag_id' => '',
        ]);
        $tags = $data['tag_id'];
        unset($data['tag_id']);

//          Альтернатива с большей управляемостью
//        $article = new Article();
//        $article->fill($data);
//        $article->save();

        $article = Article::create($data);
        $article->tags()->attach($tags);

        return redirect()->route('articles.index');
//        dd($data);
    }

    public function show($id)
    {
        $article = Article::query()->findOrFail($id);
//        dump($article->tags);
//        $tag = Tag::query()->findOrFail($id);
//        dump($tag->articles);

        return view('show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::query()->findOrFail($id);
        $categories = Category::all();
        $allTags = Tag::all();
        $articleTags = $article->tags;
        return view('edit', compact('article', 'categories', 'allTags', 'articleTags'));

    }

    public function update(Request $request, $id)
    {
        $article = Article::query()->findOrFail($id);
        $data = $this->validate($request, [
            'title' => 'required|unique:articles',
            'content' => 'required|min:20',
            'image' => 'required|min:4',
            'likesUsers' => '',
            'category_id' => '',
            'tag_id' => '',
        ]);

        $tags = $data['tag_id'];
        unset($data['tag_id']);

//        альтернативное обновление например для части данных
//        $article->title = $data['title'];
//        $article->content = $data['content'];
//        $article->image = $data['image'];
//        $article->likesUsers = $data['likesUsers'];
//        $article->category_id = $data['category_id'];
//        $article->save();

        $article->update($data);
        $article->tags()->sync($tags);



        return redirect()->route('articles.index', $id);
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
