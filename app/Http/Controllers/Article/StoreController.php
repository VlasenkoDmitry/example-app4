<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $this->validated();

        $tags = $data['tag_id'];
        unset($data['tag_id']);

//          Альтернатива с большей управляемостью
//        $article = new Article();
//        $article->fill($data);
//        $article->save();

        $article = Article::create($data);
        $article->tags()->attach($tags);

        return redirect()->route('articles.index')->with('success','Item created successfully!');
//        dd($data);
    }
}
