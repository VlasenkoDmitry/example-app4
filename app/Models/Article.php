<?php

namespace App\Models;

use App\Http\Controllers\ArticleController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'image', 'likes', 'isPublished'];

    public function category()
    {
        $category = $this->belongsTo(ArticleController::class, "id", "category_id");
        return $category;
    }
}
