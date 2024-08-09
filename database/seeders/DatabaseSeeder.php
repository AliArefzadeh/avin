<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(1)
            ->has(
                Post::factory(10)->has(Comment::factory(2))
            )
            ->has(
                Video::factory(10)->has(Comment::factory(1))
            )

            ->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    }
}
