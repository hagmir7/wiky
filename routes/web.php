<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::prefix('/books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.home');
    Route::get('/{book:slug}', [BookController::class, 'show'])->name('books.show');
});
