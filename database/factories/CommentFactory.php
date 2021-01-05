<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

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
     * @return array
     */
    public function definition() // THIS DOESNT WORK - JUST EXITS ARTISAN TINKER
    {
        return [
            'id' => \App\Models\Comment::factory(),
            'user_id' => \App\Models\User::factory(),
            'post_id' => \App\Models\Post::factory(),
            'body' => $this->faker->sentence 
        ];
    }
}
