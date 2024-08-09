<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::firstOrNew(),
            'body' => $this->faker->realText(),
            'commentable_type' => $this->commentable(),
            'commentable_id' => rand(1,10),

        ];
    }
    private function commentable()
    {
        return $this->faker->randomElement([
            Video::class,
            Post::class,

        ]);
    }
}
