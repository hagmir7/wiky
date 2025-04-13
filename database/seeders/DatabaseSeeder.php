<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserStatusEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Language, Category, Country, Author, Series, Book, Collection, Review, Post, Comment, Quote};

class DatabaseSeeder extends Seeder
{
    // Constants for data generation
    private const USER_COUNT = 10;
    private const LANGUAGE_COUNT = 10;
    private const CATEGORY_COUNT = 10;
    private const COUNTRY_COUNT = 10;
    private const AUTHOR_COUNT = 10;
    private const SERIES_COUNT = 5;
    private const BOOK_COUNT = 10;
    private const COLLECTION_COUNT = 3;
    private const REVIEW_COUNT = 15;
    private const POST_COUNT = 50;
    private const PARENT_COMMENT_COUNT = 15;
    private const CHILD_COMMENT_COUNT = 15;
    private const QUOTE_COUNT = 10;

    private $users;
    private $categories;
    private $books;

    public function run(): void
    {
        try {
            $this->command->info('Starting database seeding...');

            $this->createAdminUser();

            $this->createBasicData();

            $this->createAuthorsAndSeries();

            $this->createBooksAndCollections();

            $this->createContentAndInteractions();

            $this->command->info('Database seeding completed successfully!');
        } catch (\Exception $e) {
            $this->command->error("Seeding failed: {$e->getMessage()}");
            throw $e;
        }
    }

    private function createAdminUser(): void
    {
        $this->command->info('Creating admin user...');
        User::factory()->create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'status' => UserStatusEnum::Active->value,
        ]);
    }

    private function createBasicData(): void
    {
        $this->command->info('Creating basic data...');
        $this->users = User::factory(self::USER_COUNT)->create();
        Language::factory(self::LANGUAGE_COUNT)->create();
        $this->categories = Category::factory(self::CATEGORY_COUNT)->create();
        Country::factory(self::COUNTRY_COUNT)->create();
    }

    private function createAuthorsAndSeries(): void
    {
        $this->command->info('Creating authors and series...');

        // Create authors with optional user association
        Author::factory(self::AUTHOR_COUNT)
            ->create([
                'country_id' => fn() => Country::inRandomOrder()->first()->id,
            ])
            ->each(function ($author) {
                if (fake()->boolean(50)) {
                    $author->user()->associate($this->users->random())->save();
                }
            });

        // Create series
        Series::factory(self::SERIES_COUNT)->create();
    }

    private function createBooksAndCollections(): void
    {
        $this->command->info('Creating books and collections...');

        // Create books with categories
        $this->books = Book::factory(self::BOOK_COUNT)
            ->create([
                'language_id' => fn() => Language::inRandomOrder()->first()->id,
                'author_id' => fn() => Author::inRandomOrder()->first()->id,
                'series_id' => fn() => fake()->boolean(30)
                    ? Series::inRandomOrder()->first()->id
                    : null,
            ])
            ->each(function ($book) {
                $book->categories()->attach(
                    $this->categories->random(fake()->numberBetween(1, 3))
                );
            });

        // Create collections with books and categories
        Collection::factory(self::COLLECTION_COUNT)
            ->create()
            ->each(function ($collection) {
                $collection->books()->attach(
                    $this->books->random(fake()->numberBetween(3, 10))
                );
                $collection->categories()->attach(
                    $this->categories->random(fake()->numberBetween(1, 3))
                );
            });
    }

    private function createContentAndInteractions(): void
    {
        $this->command->info('Creating content and interactions...');

        // Create reviews using existing users
        Review::factory(self::REVIEW_COUNT)->create([
            'user_id' => fn() => $this->users->random()->id,
            'book_id' => fn() => $this->books->random()->id,
        ]);

        // Create posts with categories using existing users
        Post::factory(self::POST_COUNT)
            ->create([
                'user_id' => fn() => $this->users->random()->id,
                'book_id' => fn() => fake()->boolean(70) ? $this->books->random()->id : null,
            ])
            ->each(function ($post) {
                $post->categories()->attach(
                    $this->categories->random(fake()->numberBetween(1, 3))
                );
            });

        // Create comments hierarchy using existing users
        $parentComments = Comment::factory(self::PARENT_COMMENT_COUNT)->create([
            'user_id' => fn() => $this->users->random()->id,
            'collection_id' => fn() => Collection::inRandomOrder()->first()->id,
        ]);

        Comment::factory(self::CHILD_COMMENT_COUNT)->create([
            'user_id' => fn() => $this->users->random()->id,
            'comment_id' => fn() => $parentComments->random()->id,
            'collection_id' => fn() => Collection::inRandomOrder()->first()->id,
        ]);

        // Create quotes and attach to books using existing users
        Quote::factory(self::QUOTE_COUNT)->create([
            'user_id' => fn() => $this->users->random()->id,
            'book_id' => fn() => $this->books->random()->id,
        ]);
    }
}
