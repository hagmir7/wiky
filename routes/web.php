<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('index');
});

Route::prefix('/books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.home');
    Route::get('/{book:slug}', [BookController::class, 'show'])->name('books.show');
});

// Blog routes
Route::prefix('/blog')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('blogs.list');
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('blogs.show');
});
