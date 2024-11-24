<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence();
        return [
            'title' => $title,
            'user_id' => User::factory(),
            'description' => $this->faker->paragraph(),
            'book_id' => $this->faker->boolean(70) ? Book::factory() : null,
            'content' => $this->faker->paragraphs(5, true),
            'slug' => Str::slug($title),
        ];
    }
}
