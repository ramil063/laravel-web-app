<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(2, 8));
        $text = $this->faker->realText(rand(1000, 4000));
        $isPublished = rand(1, 5) > 1;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text(rand(40, 100)),
            'content' => $text,
            'user_id' => (rand(1, 5) == 5) ? 1 : 2,
            'rubric_id' => rand(1, 3),
            'category_id' => rand(1, 3),
            'status_id' => $isPublished ?: rand(2, 3),
            'published_at' => $isPublished ? $this->faker->dateTimeBetween('-2 months', '-1 day') : null
        ];
    }
}
