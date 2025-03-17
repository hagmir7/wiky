<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(Page $page)
    {
        return view('page.show', compact('page'));
    }
}
