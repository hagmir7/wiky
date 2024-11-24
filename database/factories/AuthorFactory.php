<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fullName = $this->faker->unique()->name();
        return [
            'user_id' => null,
            'full_name' => $fullName,
            'birth' => $this->faker->date(),
            'description' => $this->faker->paragraphs(3, true),
            'slug' => Str::slug($fullName),
            'is_verified' => $this->faker->boolean(),
            'country_id' => Country::factory(),
        ];
    }
}
