<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;


class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, $id)
    {
        $article = Article::query()->findOrFail($id);
        $data = $this->validated();

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
}
