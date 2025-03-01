<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::prefix('/books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.home');
    Route::get('/{book:slug}', [BookController::class, 'show'])->name('books.show');
});

// Blog routes
Route::prefix('/blogs')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('blogs.list');
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('blogs.show');
});
