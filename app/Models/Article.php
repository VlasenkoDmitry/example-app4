<?php

namespace App\Models;

use App\Http\Controllers\ArticleController;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'image', 'likesUsers', 'isPublished', 'category_id'];

    public function category()
    {
        $category = $this->belongsTo(ArticleController::class, "id", "category_id");
        return $category;
    }

    public function tags()
    {
        $tags = $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
        return $tags;
    }
}
