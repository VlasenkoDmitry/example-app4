<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text('200'),
            'image' => $this->faker->imageUrl(),
            'likesUsers'=>$this->faker->numberBetween(1,2000),
            'isPublished'=>1,
            'category_id'=> Category::all()->random()->id,
        ];
    }
}
