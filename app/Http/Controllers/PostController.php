<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('blogs.list');
    }

    public function show(Post $post)
    {
        return view('blogs.show', compact('post'));
    }
}
