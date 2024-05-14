<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;


class UpdateController extends BaseController
{
    public function __invoke(StoreRequest $request, $id)
    {
        $article = Article::query()->findOrFail($id);
        $data = $this->validated();
        $this->service->store($article, $data);
        return redirect()->route('articles.index', $id);
    }
}
