<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserStatusEnum;
use Illuminate\Database\Seeder;
use App\Models\{User, Language, Category, Country, Author, Series, Book, Collection, Review, Post, Comment, Quote};

class DatabaseSeeder extends Seeder
{
    // Constants for data generation
    private const USER_COUNT = 20;
    private const LANGUAGE_COUNT = 10;
    private const CATEGORY_COUNT = 15;
    private const COUNTRY_COUNT = 30;
    private const AUTHOR_COUNT = 50;
    private const SERIES_COUNT = 20;
    private const BOOK_COUNT = 100;
    private const COLLECTION_COUNT = 10;
    private const REVIEW_COUNT = 200;
    private const POST_COUNT = 50;
    private const PARENT_COMMENT_COUNT = 100;
    private const CHILD_COMMENT_COUNT = 50;
    private const QUOTE_COUNT = 150;

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
        Author::factory(self::AUTHOR_COUNT)
            ->create()
            ->each(function ($author) {
                if (fake()->boolean(50)) {
                    $author->user()->associate($this->users->random())->save();
                }
            });

        Series::factory(self::SERIES_COUNT)->create();
    }

    private function createBooksAndCollections(): void
    {
        $this->command->info('Creating books and collections...');
        
        // Create books with categories
        $this->books = Book::factory(self::BOOK_COUNT)
            ->create()
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
        
        // Create reviews
        Review::factory(self::REVIEW_COUNT)->create();

        // Create posts with categories
        Post::factory(self::POST_COUNT)
            ->create()
            ->each(function ($post) {
                $post->categories()->attach(
                    $this->categories->random(fake()->numberBetween(1, 3))
                );
            });

        // Create comments hierarchy
        $parentComments = Comment::factory(self::PARENT_COMMENT_COUNT)->create();
        Comment::factory(self::CHILD_COMMENT_COUNT)->create([
            'comment_id' => fn() => $parentComments->random()->id,
        ]);

        // Create quotes and attach to books
        Quote::factory(self::QUOTE_COUNT)->create([
            'user_id' => fn() => $this->users->random()->id,
            'book_id' => fn() => $this->books->random()->id,
        ]);
    }
}
