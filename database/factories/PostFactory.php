<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::query()->value('id'),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'published' => true,
            'published_at' => $this->faker->dateTimeBetween(now()->subYear(), now()),
        ];
    }
}
