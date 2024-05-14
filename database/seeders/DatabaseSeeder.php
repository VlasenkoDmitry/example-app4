<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Category::factory(10)->create();
        Tag::factory(10)->create();
        Article::factory(100)->create();

        $articles = Article::all();
        $tags = Tag::all();

        foreach ($articles as $article) {
            $tagsIds = $tags->random(random_int(1,5))->pluck('id');
            $article->tags()->attach($tagsIds);
        }
    }
}
