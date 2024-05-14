<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $this->validated();
        $this->service->store($data);
        return redirect()->route('articles.index')->with('success','Item created successfully!');
    }
}
