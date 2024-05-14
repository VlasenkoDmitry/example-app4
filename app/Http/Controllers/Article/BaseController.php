<?php

namespace App\Http\Controllers\Article;

use App\Services\Article\Service;

class BaseController
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
