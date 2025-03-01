<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::published()
            ->with('author', 'media')
            ->latest()
            ->take(9)
            ->get();

        return view('index', compact('books'));
    }
}
