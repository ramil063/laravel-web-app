<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $text = $this->faker->realText(rand(100, 200));
        $isPublished = rand(1, 5) > 1;
        return [
            'text' => $text,
            'user_id' => (rand(1, 5) == 5) ? 1 : 2,
            'published_at' => $isPublished ? $this->faker->dateTimeBetween('-2 months', '-1 day') : null
        ];
    }
}
