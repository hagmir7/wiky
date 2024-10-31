<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Series;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->sentence();
        return [
            'name' => $name,
            'user_id' => User::factory(),
            'author_id' => Author::factory(),
            'series_id' => $this->faker->boolean(70) ? Series::factory() : null,
            'description' => $this->faker->paragraphs(3, true),
            'content' => $this->faker->paragraphs(10, true),
            'tags' => json_encode($this->faker->words(5)),
            'isbn' => $this->faker->isbn10(),
            'isbn13' => $this->faker->isbn13(),
            'image' => $this->faker->imageUrl(600, 800, 'abstract'),
            'publication_date' => $this->faker->dateTimeBetween('-30 years', 'now'),
            'pages' => $this->faker->numberBetween(50, 1000),
            'file' => $this->faker->boolean(70) ? 'books/sample.pdf' : null,
            'slug' => Str::slug($name),
            'status' => $this->faker->boolean(80),
        ];
    }
}
