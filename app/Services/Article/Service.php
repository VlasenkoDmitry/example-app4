<?php

namespace App\Services\Article;

use App\Models\Article;

class Service
{
    public function store($data)
    {
        $tags = $data['tag_id'];
        unset($data['tag_id']);

//          Альтернатива с большей управляемостью
//        $article = new Article();
//        $article->fill($data);
//        $article->save();

        $article = Article::create($data);
        $article->tags()->attach($tags);
    }

    public function update(Article $article, Array $data)
    {
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


    }
}
